<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nha_san_xuat extends Model
{
    use HasFactory;
    protected $table = 'nha_san_xuat';
    public $autoincrement = true;
    protected $primaryKey = 'ma_nha_san_xuat';
    protected $keytype = 'int';
    public $timestamps = false;
    public function san_phams()
	{
        return $this->hasMany('App\Models\San_pham', 'ma_nha_san_xuat', 'ma_nha_san_xuat');
	}
}
