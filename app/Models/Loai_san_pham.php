<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_san_pham extends Model
{
    use HasFactory;
    protected $table = 'loai_san_pham';
    public $autoincrement = true;
    protected $primaryKey = 'ma_loai_san_pham';
    protected $keytype = 'int';
    public $timestamps = false;
    public function san_phams()
	{
        return $this->hasMany('App\Models\San_pham', 'ma_loai_san_pham', 'ma_loai_san_pham');
	}
}
