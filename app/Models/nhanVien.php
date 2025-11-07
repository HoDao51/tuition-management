<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanVien extends Model
{
    /** @use HasFactory<\Database\Factories\NhanVienFactory> */
    use HasFactory;

    protected $filltable = [
        'ma_nv',
        'hoTen',
        'chucVu',
        'email',
        'soDienThoai',
        'tinhTrang'
    ];

    protected function hocPhi(){
        return $this->hasMany(hocPhi::class);
    }
    protected function bienLai(){
        return $this->hasMany(bienLai::class);
    }


}
