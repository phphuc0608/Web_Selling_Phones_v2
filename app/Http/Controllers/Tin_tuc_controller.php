<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Loai_tin_tuc;
use App\Models\Tin_tuc;
use Illuminate\Http\Request;

class Tin_tuc_controller extends Controller
{
    public function view_quan_ly($page){
        $loai_tin_tucs = Loai_tin_tuc::all();
        $data = [];
        $page_length = 4;
        $all_tin_tucs = Tin_tuc::with(['loai_tin_tuc'])->get();
        $data['tin_tucs'] =  $all_tin_tucs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_tin_tucs->count()/$page_length);
        if($all_tin_tucs->count() % $page_length > 0){
            $page_number++;
        }
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        return view('Tin_tuc.quan_ly_tin_tuc',$data)->with('loai_tin_tucs',$loai_tin_tucs);
    }
    public function view_them(){
        $loai_tin_tucs = Loai_tin_tuc::all();
        return view('Tin_tuc.them_tin_tuc')->with('loai_tin_tucs',$loai_tin_tucs);
    }
    public function xu_ly_them(Request $request){
        $tin_tuc = new Tin_tuc();
        $tin_tuc->tieu_de = $request->tieu_de;
        if($request->hasFile('hinh_anh')){
            $file = $request->hinh_anh;
            $filename = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('tin_tuc', $filename);
            $tin_tuc->hinh_anh = $filename;
        }
        else{
            $tin_tuc->hinh_anh = "";
        }
        $tin_tuc->ma_loai_tin_tuc = $request->ma_loai_tin_tuc;
        $tin_tuc->tom_tat = $request->tom_tat;
        $tin_tuc->noi_dung = $request->noi_dung;
        $tin_tuc->trang_thai = $request-> has('trang_thai');
        $tin_tuc->luot_xem = 0;
        $tin_tuc->tai_khoan = 'admin';
        $tin_tuc->save();
        return redirect()->route('quan_ly_tin_tuc', 1);
    }
    public function view_sua($ma_tin_tuc){
        $loai_tin_tucs = Loai_tin_tuc::all();
        $data = [];
        $page_length = 4;
        $page = 1;
        $data['tin_tuc'] = Tin_tuc::find($ma_tin_tuc);
        
        if ($data['tin_tuc'] == null) {
            return redirect()->route('them_tin_tuc', 1);
        }
        
        $all_tin_tucs = Tin_tuc::all();
        $data['tin_tucs'] = $all_tin_tucs->skip(($page - 1) * $page_length)->take($page_length);
        $page_number = (int)($all_tin_tucs->count() / $page_length);
        
        if ($all_tin_tucs->count() % $page_length > 0) {
            $page_number++;
        }
        
        $data['page_number'] = $page_number;
        $data['page'] = $page;
        
        
        return view("Tin_tuc.sua_tin_tuc", $data)->with('loai_tin_tucs',$loai_tin_tucs);
    }
    
    public function xu_ly_sua(Request $request){
        $tin_tuc = Tin_tuc::find($request->ma_tin_tuc);
        $tin_tuc->tieu_de = $request->tieu_de;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->hinh_anh;
            $filename = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('tin_tuc', $filename);
    
            if (File::exists(public_path('tiun_tuc/'.$tin_tuc->hinh_anh))) {
                File::delete(public_path('tiun_tuc/'.$tin_tuc->hinh_anh));
            }
    
            $tin_tuc->hinh_anh = $filename;
        }
        $tin_tuc->ma_loai_tin_tuc = $request->ma_loai_tin_tuc;
        $tin_tuc->tom_tat = $request->tom_tat;
        $tin_tuc->noi_dung = $request->noi_dung;
        $tin_tuc->trang_thai = $request-> has('trang_thai');
        $tin_tuc->luot_xem = 0;
        $tin_tuc->tai_khoan = 'admin';
        $tin_tuc->save();
    
        return redirect()->route('sua_tin_tuc', $request->ma_tin_tuc);
    }
    public function xu_ly_xoa($ma_tin_tuc){
        $tin_tuc = Tin_tuc::find($ma_tin_tuc);
        if(File::exists(public_path('tin_tuc/'.$tin_tuc->hinh_anh)))
            File::delete(public_path('tin_tuc/'.$tin_tuc->hinh_anh));
        $tin_tuc->delete();
        return redirect()->route('quan_ly_tin_tuc', 1);
    }
}
