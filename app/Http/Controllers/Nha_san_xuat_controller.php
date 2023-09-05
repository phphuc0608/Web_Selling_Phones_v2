<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Nha_san_xuat;
use Illuminate\Http\Request;

class Nha_san_xuat_controller extends Controller
{
    public function view_them($page){
        $data = [];
        $page_length = 4;
        $all_nha_san_xuats = Nha_san_xuat::all();
        $data['nha_san_xuats'] =  $all_nha_san_xuats->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_nha_san_xuats->count()/$page_length);
        if($all_nha_san_xuats->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view('Nha_san_xuat.them_nha_san_xuat',$data);
    }
    public function xu_ly_them(Request $request){
        $nha_san_xuat = new Nha_san_xuat();
        $nha_san_xuat->ten_nha_san_xuat = $request->ten_nha_san_xuat;
        if($request->hasFile('hinh_anh')){
            $file = $request->hinh_anh;
            //Lấy thời gian upload nối với tên file xong mã hóa md5 rồi nối đuôi file
            $filename = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            //.move() mặc định ở public
            $file->move('nha_san_xuat', $filename);
            $nha_san_xuat->hinh_anh = $filename;
        }
        else{
            $nha_san_xuat->hinh_anh = "";
        }
        $nha_san_xuat->trang_thai = $request-> has('trang_thai');
        $nha_san_xuat->save();
        return redirect()->route('them_nha_san_xuat', ['page' => 1]);
    }
    public function view_sua($ma_nha_san_xuat){
        $data=[];
        $page_length = 4;
        $page = 1;
        $data['nha_san_xuat']=Nha_san_xuat::find($ma_nha_san_xuat);
        if($data['nha_san_xuat'] == null){
            return redirect()->route('them_nha_san_xuat',1);
        }
        $all_nha_san_xuats = Nha_san_xuat::all();
        $data['nha_san_xuats'] =  $all_nha_san_xuats->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_nha_san_xuats->count()/$page_length);
        if($all_nha_san_xuats->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view("Nha_san_xuat.sua_nha_san_xuat",$data);
    }
    public function xu_ly_sua(Request $request){
        $nha_san_xuat = Nha_san_xuat::find($request->ma_nha_san_xuat);
        if($request->hasFile('hinh_anh')){
            $file = $request->hinh_anh;
            $filename = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('nha_san_xuat', $filename);
            if(File::exists(public_path('nha_san_xuat/'.$nha_san_xuat->hinh_anh)))
                File::delete(public_path('nha_san_xuat/'.$nha_san_xuat->hinh_anh));
            $nha_san_xuat->hinh_anh = $filename;
        }
        $nha_san_xuat->ten_nha_san_xuat=$request->ten_nha_san_xuat;
        $nha_san_xuat->trang_thai=$request->has('trang_thai');
        $nha_san_xuat->save();
        return redirect()->route('sua_nha_san_xuat',$request->ma_nha_san_xuat);
    }
    public function xu_ly_xoa($ma_nha_san_xuat){
        $nha_san_xuat = Nha_san_xuat::find($ma_nha_san_xuat);
        if(File::exists(public_path('nha_san_xuat/'.$nha_san_xuat->hinh_anh)))
            File::delete(public_path('nha_san_xuat/'.$nha_san_xuat->hinh_anh));
        $nha_san_xuat->delete();
        return redirect()->route('them_nha_san_xuat', 1);
    }
}

