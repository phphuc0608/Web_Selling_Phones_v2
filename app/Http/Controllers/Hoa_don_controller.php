<?php

namespace App\Http\Controllers;

use App\Models\Chi_tiet_hoa_don;
use App\Models\Hoa_don;
use App\Models\San_pham;
use Illuminate\Http\Request;

class Hoa_don_controller extends Controller
{
    public function view_them(){
        $data = [];
        $data['san_phams'] = San_pham::all();
        return view('Hoa_don.them_hoa_don', $data);
    }
    public function xu_ly_them(Request $request){
        $hoa_don = new Hoa_don();
        $hoa_don->ngay_tao = now();
        $hoa_don->nguoi_tao = $request->nguoi_tao;
        $hoa_don->khach_hang = $request->khach_hang;
        $so_chi_tiet_hoa_don = $request->so_chi_tiet_hoa_don;
        $hoa_don->tong_tien = 0;
        $hoa_don->khuyen_mai = 0;
        $tong_tien = 0;
        $khuyen_mai = 0;
        $hoa_don->save();
        for($i = 1; $i <= $so_chi_tiet_hoa_don; $i++){
            $chi_tiet_hoa_don = new Chi_tiet_hoa_don();
            $chi_tiet_hoa_don->ma_san_pham = $request->input('ma_san_pham_'.$i);
            $chi_tiet_hoa_don->khuyen_mai= $request->input('khuyen_mai_'.$i);
            $chi_tiet_hoa_don->so_luong = $request->input('so_luong_'.$i);
            $chi_tiet_hoa_don->don_gia = San_pham::find($chi_tiet_hoa_don->ma_san_pham)->gia; 
            $tong_tien = $tong_tien + $chi_tiet_hoa_don->don_gia * $chi_tiet_hoa_don->so_luong;
            $khuyen_mai = $khuyen_mai + $chi_tiet_hoa_don->khuyen_mai;          
            $hoa_don->chi_tiet_hoa_dons()->save($chi_tiet_hoa_don);
        }
        $hoa_don->tong_tien = $tong_tien;
        $hoa_don->khuyen_mai = $khuyen_mai;
        $hoa_don->save();
    }
}
