<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinhVien extends Model
{
    /** @use HasFactory<\Database\Factories\SinhVienFactory> */
    use HasFactory;

    protected $filltable = [
        'ma_sv',
        'hoTen',
        'ngaySinh',
        'gioiTinh',
        'diaChi',
        'soDienThoai',
        'email',
        'id_lop',
        'tinhTrang'
    ];
    protected function lop(){
        return $this->belongsTo(lop::class);
    }
}
