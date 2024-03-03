<?php

namespace App\Http\Controllers;

use App\Models\Loai_san_pham;
use App\Models\Nha_san_xuat;
use App\Models\San_pham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class San_pham_controller extends Controller
{
	public function view_quan_ly($page)
	{
		if (session('nguoi_dung') != null) {
			$data = [];
			$page_length = 4;
			$all_san_phams = San_pham::with(['loai_san_pham', 'nha_san_xuat'])->get();
			$data['san_phams'] =  $all_san_phams->skip(($page - 1) * $page_length)->take($page_length);
			$page_number = (int)($all_san_phams->count() / $page_length);
			if ($all_san_phams->count() % $page_length > 0) {
				$page_number++;
			}
			$data['page_number'] = $page_number;
			$data['page'] = $page;
			return view('San_pham.quan_ly_san_pham', $data);
		} else {
			return redirect()->route('dang_nhap');
		}
	}
	public function view_them()
	{
		if (session('nguoi_dung') != null) {
			$loai_san_phams = Loai_san_pham::all();
			$nha_san_xuats = Nha_san_xuat::all();
			return view('San_pham.them_san_pham')->with('loai_san_phams', $loai_san_phams)->with('nha_san_xuats', $nha_san_xuats);
		} else {
			return redirect()->route('dang_nhap');
		}
	}
	public function xu_ly_them(Request $request)
	{
		$san_pham = new San_pham();
		$san_pham->ten_san_pham = $request->ten_san_pham;
		if ($request->hasFile('hinh_anh')) {
			$file = $request->hinh_anh;
			$filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
			$file->move('san_pham', $filename);
			$san_pham->hinh_anh = $filename;
		} else {
			$san_pham->hinh_anh = "";
		}
		$san_pham->gia = $request->gia;
		$san_pham->ma_loai_san_pham = $request->ma_loai_san_pham;
		$san_pham->ma_nha_san_xuat = $request->ma_nha_san_xuat;
		$san_pham->mo_ta = $request->mo_ta;
		$so_phan_tram_giam = $request->input('so_phan_tram_giam');
		if ($so_phan_tram_giam !== null) {
			// Tính toán giá khuyến mãi dưới dạng giá trị thực tế (thường là phần trăm giảm trừ)
			$gia_duoc_giam = $san_pham->gia * ($so_phan_tram_giam / 100);
			$gia_khuyen_mai = $san_pham->gia - $gia_duoc_giam;
			$san_pham->gia_khuyen_mai = $gia_khuyen_mai;
		} else {
			// Nếu không có giá trị nhập, mặc định là không có khuyến mãi
			$san_pham->gia_khuyen_mai = 0;
		}
		$san_pham->trang_thai = $request->has('trang_thai');
		$san_pham->luot_xem = 0;
		$san_pham->tai_khoan = 'admin';
		$san_pham->save();
		return redirect()->route('quan_ly_san_pham', 1);
	}
	public function view_sua($ma_san_pham)
	{
		if (session('nguoi_dung') != null) {
			$loai_san_phams = Loai_san_pham::all();
			$nha_san_xuats = Nha_san_xuat::all();
			$data = [];
			$page_length = 4;
			$page = 1;
			$data['san_pham'] = San_pham::find($ma_san_pham);

			if ($data['san_pham'] == null) {
				return redirect()->route('them_san_pham', 1);
			}

			$all_san_phams = San_pham::all();
			$data['san_phams'] = $all_san_phams->skip(($page - 1) * $page_length)->take($page_length);
			$page_number = (int)($all_san_phams->count() / $page_length);

			if ($all_san_phams->count() % $page_length > 0) {
				$page_number++;
			}

			$data['page_number'] = $page_number;
			$data['page'] = $page;

			// Tính toán giá trị so_phan_tram_giam từ giá khuyến mãi và giá gốc và truyền nó vào view
			$gia_khuyen_mai = $data['san_pham']->gia_khuyen_mai;
			$gia_goc = $data['san_pham']->gia;
			$so_phan_tram_giam = (($gia_goc - $gia_khuyen_mai) / $gia_goc) * 100;
			$data['so_phan_tram_giam'] = $so_phan_tram_giam;

			return view("San_pham.sua_san_pham", $data)->with('loai_san_phams', $loai_san_phams)->with('nha_san_xuats', $nha_san_xuats);
		} else {
			return redirect()->route('dang_nhap');
		}
	}

	public function xu_ly_sua(Request $request)
	{
		$san_pham = San_pham::find($request->ma_san_pham);

		// Cập nhật các trường của sản phẩm
		$san_pham->ten_san_pham = $request->ten_san_pham;
		$san_pham->gia = $request->gia;
		$san_pham->ma_loai_san_pham = $request->ma_loai_san_pham;
		$san_pham->ma_nha_san_xuat = $request->ma_nha_san_xuat;
		$san_pham->mo_ta = $request->mo_ta;

		// Xử lý hình ảnh nếu có
		if ($request->hasFile('hinh_anh')) {
			$file = $request->hinh_anh;
			$filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
			$file->move('san_pham', $filename);

			if (File::exists(public_path('san_pham/' . $san_pham->hinh_anh))) {
				File::delete(public_path('san_pham/' . $san_pham->hinh_anh));
			}

			$san_pham->hinh_anh = $filename;
		}

		// Xử lý giá khuyến mãi
		$so_phan_tram_giam = $request->input('so_phan_tram_giam');
		if ($so_phan_tram_giam !== null) {
			// Tính toán giá khuyến mãi dưới dạng giá trị thực tế (thường là phần trăm giảm trừ)
			$gia_duoc_giam = $san_pham->gia * ($so_phan_tram_giam / 100);
			$gia_khuyen_mai = $san_pham->gia - $gia_duoc_giam;
			$san_pham->gia_khuyen_mai = $gia_khuyen_mai;
		}

		$san_pham->trang_thai = $request->has('trang_thai');
		$san_pham->luot_xem = 0;
		$san_pham->tai_khoan = 'admin';
		$san_pham->save();

		return redirect()->route('sua_san_pham', $request->ma_san_pham);
	}

	public function xu_ly_xoa($ma_san_pham)
	{
		$san_pham = San_pham::find($ma_san_pham);
		if (File::exists(public_path('san_pham/' . $san_pham->hinh_anh)))
			File::delete(public_path('san_pham/' . $san_pham->hinh_anh));
		$san_pham->delete();
		return redirect()->route('quan_ly_san_pham', 1);
	}
}
