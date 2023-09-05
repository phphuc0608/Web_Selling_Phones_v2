<?php

namespace App\Http\Controllers;

use App\Models\Loai_tin_tuc;
use Illuminate\Http\Request;

class Loai_tin_tuc_controller extends Controller
{
    public function view_them($page){
        $data = [];
        $page_length = 4;
        $all_loai_tin_tucs = Loai_tin_tuc::all();
        $data['loai_tin_tucs'] =  $all_loai_tin_tucs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_loai_tin_tucs->count()/$page_length);
        if($all_loai_tin_tucs->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view('Loai_tin_tuc.them_loai_tin_tuc',$data);
    }
    public function xu_ly_them(Request $request){
        $loai_tin_tuc = new Loai_tin_tuc();
        $loai_tin_tuc->ten_loai_tin_tuc = $request->ten_loai_tin_tuc;
        $loai_tin_tuc->trang_thai = $request-> has('trang_thai');
        $loai_tin_tuc->save();
        return redirect()->route('them_loai_tin_tuc', 1);
    }
    public function view_sua($ma_loai_tin_tuc){
        $data=[];
        $page_length = 4;
        $page = 1;
        $data['loai_tin_tuc']=Loai_tin_tuc::find($ma_loai_tin_tuc);
        if($data['loai_tin_tuc'] == null){
            return redirect()->route('them_loai_tin_tuc',1);
        }
        $all_loai_tin_tucs = Loai_tin_tuc::all();
        $data['loai_tin_tucs'] =  $all_loai_tin_tucs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_loai_tin_tucs->count()/$page_length);
        if($all_loai_tin_tucs->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view("Loai_tin_tuc.sua_loai_tin_tuc",$data);
    }
    public function xu_ly_sua(Request $request){
        $loai_tin_tuc = Loai_tin_tuc::find($request->ma_loai_tin_tuc);
        $loai_tin_tuc->ten_loai_tin_tuc=$request->ten_loai_tin_tuc;
        $loai_tin_tuc->trang_thai=$request->has('trang_thai');
        $loai_tin_tuc->save();
        return redirect()->route('sua_loai_tin_tuc',$request->ma_loai_tin_tuc);
    }
    public function xu_ly_xoa($ma_loai_tin_tuc){
        $loai_tin_tuc = Loai_tin_tuc::find($ma_loai_tin_tuc);
        if($loai_tin_tuc->tin_tucs->count() > 0){
            return redirect()->route('them_loai_tin_tuc', 1)->with('error','Còn tồn tại tin tức ở loại tin tức này');
        }
        $loai_tin_tuc->delete();
        return redirect()->route('them_loai_tin_tuc', 1);
    }
}
