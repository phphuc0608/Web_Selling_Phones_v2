<?php

namespace App\Http\Controllers;

use App\Models\Nguoi_dung;
use Illuminate\Http\Request;
class Nguoi_dung_controller extends Controller
{
    public function view_them($page){
        $data = [];
        $page_length = 4;
        $all_nguoi_dungs = Nguoi_dung::all();
        $data['nguoi_dungs'] =  $all_nguoi_dungs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_nguoi_dungs->count()/$page_length);
        if($all_nguoi_dungs->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view('Nguoi_dung.them_nguoi_dung',$data);
    }
    public function xu_ly_them(Request $request){
        $nguoi_dung = new Nguoi_dung();
        $nguoi_dung->tai_khoan = $request->tai_khoan;
        $nguoi_dung->mat_khau = md5($request->mat_khau);
        $nguoi_dung->trang_thai = $request-> has('trang_thai');
        $xac_nhan_mat_khau = md5($request->xac_nhan_mat_khau);
        if($xac_nhan_mat_khau !=  $nguoi_dung->mat_khau){
            return redirect()->route('them_nguoi_dung', 1)->with('alert', 'Mật khẩu không trùng khớp');
        }
        $nguoi_dung->save();
        return redirect()->route('them_nguoi_dung', 1);
    }
    public function view_sua($tai_khoan){
        $data=[];
        $page_length = 4;
        $page = 1;
        $data['nguoi_dung']=Nguoi_dung::find($tai_khoan);
        if($data['nguoi_dung'] == null){
            return redirect()->route('them_nguoi_dung',1);
        }
        $all_nguoi_dungs = Nguoi_dung::all();
        $data['nguoi_dungs'] =  $all_nguoi_dungs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_nguoi_dungs->count()/$page_length);
        if($all_nguoi_dungs->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view("Nguoi_dung.sua_nguoi_dung",$data);
    }
    public function xu_ly_sua(Request $request){
        $nguoi_dung = Nguoi_dung::find($request->tai_khoan);
        if (!$nguoi_dung) {
            // Người dùng không tồn tại, xử lý lỗi hoặc chuyển hướng
            return redirect()->route('them_nguoi_dung', 1)->with('alert', 'Người dùng không tồn tại');
        }
        if ($request->mat_khau != '') {
            // Nếu có mật khẩu mới được nhập, cập nhật mật khẩu mới và xác nhận mật khẩu
            $nguoi_dung->mat_khau = md5($request->mat_khau);
            $xac_nhan_mat_khau = md5($request->xac_nhan_mat_khau);
            if ($xac_nhan_mat_khau != $nguoi_dung->mat_khau) {
                return redirect()->route('them_nguoi_dung', 1)->with('alert', 'Mật khẩu không trùng khớp');
            }
        }
    
        // Cập nhật các thông tin còn lại
        $nguoi_dung->trang_thai = $request->has('trang_thai');
        // Cập nhật các thông tin khác ở đây
    
        $nguoi_dung->save();
    
        return redirect()->route('sua_loai_san_pham', $request->tai_khoan);
    }
    public function xu_ly_xoa($tai_khoan){
        $nguoi_dung = Nguoi_dung::find($tai_khoan);
        $nguoi_dung->delete();
        return redirect()->route('them_nguoi_dung', 1);
    }
}
