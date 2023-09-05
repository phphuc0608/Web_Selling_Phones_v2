<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_tin_tuc extends Model
{
    use HasFactory;
    protected $table = 'loai_tin_tuc';
    public $autoincrement = true;
    protected $primaryKey = 'ma_loai_tin_tuc';
    protected $keytype = 'int';
    public $timestamps = false;
    public function tin_tucs()
	{
        return $this->hasMany('App\Models\Tin_tuc', 'ma_loai_tin_tuc', 'ma_loai_tin_tuc');
	}
}
