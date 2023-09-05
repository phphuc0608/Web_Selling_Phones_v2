<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tin_tuc extends Model
{
    use HasFactory;
    protected $table = 'tin_tuc';
    protected static function boot()
    {
        parent::boot();

        // Sự kiện creating sẽ được gọi trước khi tạo một bản ghi mới
        static::creating(function ($tin_tuc) {
            $tin_tuc->ngay_dang = now(); // Lấy thời gian hiện tại
        });
    }
    public $autoincrement = true;
    protected $primaryKey = 'ma_tin_tuc';
    protected $keytype = 'int';
    public $timestamps = false;
    public function loai_tin_tuc()
	{
        return $this->hasOne('App\Models\Loai_tin_tuc', 'ma_loai_tin_tuc', 'ma_loai_tin_tuc');
	}
}
