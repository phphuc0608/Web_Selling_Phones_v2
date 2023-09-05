<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San_pham extends Model
{
    use HasFactory;
    protected $table = 'san_pham';
    public $autoincrement = true;
    protected $primaryKey = 'ma_san_pham';
    protected $keytype = 'int';
    public $timestamps = false;
    public function loai_san_pham()
	{
        return $this->hasOne('App\Models\Loai_san_pham', 'ma_loai_san_pham', 'ma_loai_san_pham');
	}
    public function nha_san_xuat()
	{
        return $this->hasOne('App\Models\Nha_san_xuat', 'ma_nha_san_xuat', 'ma_nha_san_xuat');
	}
}
