<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class namHoc extends Model
{
    /** @use HasFactory<\Database\Factories\NamHocFactory> */
    use HasFactory;

    protected $fillable = [
        'tenNamHoc',
        'ngayBatDau',
        'ngayKetThuc'
    ];

    protected function hocKy(){
        return $this->hasMany(hocKy::class);
    }
}
