<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoa_don extends Model
{
    use HasFactory;
    protected $table = 'hoa_don';
    public $autoincrement = true;
    protected $primaryKey = 'ma_hoa_don';
    protected $keytype = 'int';
    public $timestamps = false;
    public function chi_tiet_hoa_dons()
	{
        return $this->hasMany('App\Models\Chi_tiet_hoa_don', 'ma_hoa_don', 'ma_hoa_don');
	}
}
