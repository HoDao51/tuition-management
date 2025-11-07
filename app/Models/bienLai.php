<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienLai extends Model
{
    /** @use HasFactory<\Database\Factories\BienLaiFactory> */
    use HasFactory;

    protected $filltable = [
        'soBienLai',
        'id_sinh_vien',
        'ngayThu',
        'soTienThu',
        'tinhTrang',
        'nguoiThu'
    ];
    protected function sinhVien(){
        return $this->belongsTo(sinhVien::class);
    }
    protected function nhanVien(){
        return $this->belongsTo(nhanVien::class);
    }
}
