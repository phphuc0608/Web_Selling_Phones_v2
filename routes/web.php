<?php

use App\Models\Loai_san_pham;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\San_pham_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Dang_nhap.dang_nhap');
});
// Loai_san_pham
Route::get('them_loai_san_pham/{page}',[\App\Http\Controllers\Loai_san_pham_controller::class,'view_them'])->name('them_loai_san_pham');
Route::post('them_loai_san_pham',[\App\Http\Controllers\Loai_san_pham_controller::class, 'xu_ly_them']);
Route::get('sua_loai_san_pham/{ma_loai_san_pham}', [\App\Http\Controllers\Loai_san_pham_controller::class, 'view_sua'])->name('sua_loai_san_pham');
Route::post('sua_loai_san_pham', [\App\Http\Controllers\Loai_san_pham_controller::class, 'xu_ly_sua']);
Route::get('xoa_loai_san_pham/{ma_loai_san_pham}', [\App\Http\Controllers\Loai_san_pham_controller::class, 'xu_ly_xoa'])->name('xoa_loai_san_pham');
// Nguoi_dung
Route::get('dang_nhap',[App\Http\Controllers\Nguoi_dung_controller::class, 'view_dang_nhap'])->name('dang_nhap');
Route::post('dang_nhap_process',[App\Http\Controllers\Nguoi_dung_controller::class, 'xu_ly_dang_nhap']);
Route::get('them_nguoi_dung/{page}',[\App\Http\Controllers\Nguoi_dung_controller::class,'view_them'])->name('them_nguoi_dung');
Route::post('them_nguoi_dung',[\App\Http\Controllers\Nguoi_dung_controller::class, 'xu_ly_them']);
Route::get('sua_nguoi_dung/{tai_khoan}', [\App\Http\Controllers\Nguoi_dung_controller::class, 'view_sua'])->name('sua_nguoi_dung');
Route::post('sua_nguoi_dung', [\App\Http\Controllers\Nguoi_dung_controller::class, 'xu_ly_sua']);
Route::get('xoa_nguoi_dung/{tai_khoan}', [\App\Http\Controllers\Nguoi_dung_controller::class, 'xu_ly_xoa'])->name('xoa_nguoi_dung');
//Nha san xuat
Route::get('them_nha_san_xuat/{page}',[\App\Http\Controllers\Nha_san_xuat_controller::class,'view_them'])->name('them_nha_san_xuat');
Route::post('them_nha_san_xuat',[\App\Http\Controllers\Nha_san_xuat_controller::class,'xu_ly_them']);
Route::get('sua_nha_san_xuat/{ma_nha_san_xuat}',[\App\Http\Controllers\Nha_san_xuat_controller::class,'view_sua'])->name('sua_nha_san_xuat');
Route::post('sua_nha_san_xuat',[\App\Http\Controllers\Nha_san_xuat_controller::class,'xu_ly_sua']);
Route::get('xoa_nha_san_xuat/{ma_nha_san_xuat}',[\App\Http\Controllers\Nha_san_xuat_controller::class, 'xu_ly_xoa'])->name('xoa_nha_san_xuat');
//Loai tin tuc
Route::get('them_loai_tin_tuc/{page}',[\App\Http\Controllers\Loai_tin_tuc_controller::class,'view_them'])->name('them_loai_tin_tuc');
Route::post('them_loai_tin_tuc',[\App\Http\Controllers\Loai_tin_tuc_controller::class,'xu_ly_them']);
Route::get('sua_loai_tin_tuc/{ma_loai_tin_tuc}',[\App\Http\Controllers\Loai_tin_tuc_controller::class,'view_sua'])->name('sua_loai_tin_tuc');
Route::post('sua_loai_tin_tuc',[\App\Http\Controllers\Loai_tin_tuc_controller::class,'xu_ly_sua']);
Route::get('xoa_loai_tin_tuc/{ma_loai_tin_tuc}',[\App\Http\Controllers\Loai_tin_tuc_controller::class, 'xu_ly_xoa'])->name('xoa_loai_tin_tuc');
//San pham
Route::get('quan_ly_san_pham/{page}',[\App\Http\Controllers\San_pham_controller::class,'view_quan_ly'])->name('quan_ly_san_pham');
Route::get('them_san_pham',[\App\Http\Controllers\San_pham_controller::class,'view_them'])->name('them_san_pham');
Route::post('them_san_pham',[\App\Http\Controllers\San_pham_controller::class,'xu_ly_them']);
Route::get('sua_san_pham/{ma_san_pham}',[\App\Http\Controllers\San_pham_controller::class,'view_sua'])->name('sua_san_pham');
Route::post('sua_san_pham', [\App\Http\Controllers\San_pham_controller::class,'xu_ly_sua']);
Route::get('xoa_san_pham/{ma_san_pham}',[\App\Http\Controllers\San_pham_controller::class,'xu_ly_xoa'])->name('xoa_san_pham');
//Tin tuc
Route::get('quan_ly_tin_tuc/{page}',[\App\Http\Controllers\Tin_tuc_controller::class,'view_quan_ly'])->name('quan_ly_tin_tuc');
Route::get('them_tin_tuc',[\App\Http\Controllers\Tin_tuc_controller::class,'view_them'])->name('them_tin_tuc');
Route::post('them_tin_tuc',[\App\Http\Controllers\Tin_tuc_controller::class,'xu_ly_them']);
Route::get('sua_tin_tuc/{ma_tin_tuc}',[\App\Http\Controllers\Tin_tuc_controller::class,'view_sua'])->name('sua_tin_tuc');
Route::post('sua_tin_tuc',[\App\Http\Controllers\Tin_tuc_controller::class,'xu_ly_sua']);
Route::get('xoa_tin_tuc/{ma_tin_tuc}',[\App\Http\Controllers\Tin_tuc_controller::class,'xu_ly_xoa'])->name('xoa_tin_tuc');
//Hoa don
Route::get('them_hoa_don',[\App\Http\Controllers\Hoa_don_controller::class,'view_them'])->name('them_hoa_don');
Route::post('them_hoa_don',[\App\Http\Controllers\Hoa_don_controller::class,'xu_ly_them']);