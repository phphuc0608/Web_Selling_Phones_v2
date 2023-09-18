<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Loai_san_pham;
use Illuminate\Http\Request;
class Loai_san_pham_controller extends Controller
{
  public function view_them($page)
  {
    if (session('nguoi_dungs') != null) {
      $data = [];
      $page_length = 4;
      $all_loai_san_phams = Loai_san_pham::all();
      $data['loai_san_phams'] =  $all_loai_san_phams->skip(($page - 1) * $page_length)->take($page_length);
      $page_number = (int)($all_loai_san_phams->count() / $page_length);
      if ($all_loai_san_phams->count() % $page_length > 0) {
        $page_number++;
      }
      $data['page_number'] = $page_number;
      $data['page'] = $page;
      return view('Loai_san_pham.them_loai_san_pham', $data);
    } else {
      return redirect()->route('dang_nhap');
    }
  }
  public function xu_ly_them(Request $request)
  {
    $loai_san_pham = new Loai_san_pham();
    $loai_san_pham->ten_loai_san_pham = $request->ten_loai_san_pham;
    if ($request->hasFile('hinh_anh')) {
      $file = $request->hinh_anh;
      //Lấy thời gian upload nối với tên file xong mã hóa md5 rồi nối đuôi file
      $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
      //.move() mặc định ở public
      $file->move('loai_san_pham', $filename);
      $loai_san_pham->hinh_anh = $filename;
    } else {
      $loai_san_pham->hinh_anh = "";
    }
    $loai_san_pham->trang_thai = $request->has('trang_thai');
    $loai_san_pham->save();
    return redirect()->route('them_loai_san_pham', 1);
  }
  public function view_sua($ma_loai_san_pham)
  {
    if (session('nguoi_dungs') != null) {
      $data = [];
      $page_length = 4;
      $page = 1;
      $data['loai_san_pham'] = Loai_san_pham::find($ma_loai_san_pham);
      if ($data['loai_san_pham'] == null) {
        return redirect()->route('them_loai_san_pham', 1);
      }
      $all_loai_san_phams = Loai_san_pham::all();
      $data['loai_san_phams'] =  $all_loai_san_phams->skip(($page - 1) * $page_length)->take($page_length);
      $page_number = (int)($all_loai_san_phams->count() / $page_length);
      if ($all_loai_san_phams->count() % $page_length > 0) {
        $page_number++;
      }
      $data['page_number'] = $page_number;
      $data['page'] = $page;
      return view("Loai_san_pham.sua_loai_san_pham", $data);
    } else {
      return redirect()->route('dang_nhap');
    }
  }
  public function xu_ly_sua(Request $request)
  {
    $loai_san_pham = Loai_san_pham::find($request->ma_loai_san_pham);
    if ($request->hasFile('hinh_anh')) {
      $file = $request->hinh_anh;
      $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
      $file->move('loai_san_pham', $filename);
      if (File::exists(public_path('loai_san_pham/' . $loai_san_pham->hinh_anh)))
        File::delete(public_path('loai_san_pham/' . $loai_san_pham->hinh_anh));
      $loai_san_pham->hinh_anh = $filename;
    }
    $loai_san_pham->ten_loai_san_pham = $request->ten_loai_san_pham;
    $loai_san_pham->trang_thai = $request->has('trang_thai');
    $loai_san_pham->save();
    return redirect()->route('sua_loai_san_pham', $request->ma_loai_san_pham);
  }
  public function xu_ly_xoa($ma_loai_san_pham)
  {
    $loai_san_pham = Loai_san_pham::find($ma_loai_san_pham);
    if ($loai_san_pham->san_phams->count() > 0) {
      return redirect()->route('them_loai_san_pham', 1)->with('error', 'Còn tồn tại sản phẩm ở loại sản phẩm này');
    }
    if (File::exists(public_path('loai_san_pham/' . $loai_san_pham->hinh_anh)))
      File::delete(public_path('loai_san_pham/' . $loai_san_pham->hinh_anh));
    $loai_san_pham->delete();
    return redirect()->route('them_loai_san_pham', 1);
  }
}