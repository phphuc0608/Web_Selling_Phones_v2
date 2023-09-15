<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chi_tiet_hoa_don extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_hoa_don';
    public $autoincrement = true;
    protected $primaryKey = 'ma_chi_tiet_hoa_don';
    protected $keytype = 'int';
    public $timestamps = false;
    public function hoa_don()
	{
        return $this->hasOne('App\Models\Hoa_don', 'ma_hoa_don', 'ma_hoa_don');
	}
}
