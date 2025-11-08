<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinhVien extends Model
{
    /** @use HasFactory<\Database\Factories\SinhVienFactory> */
    use HasFactory;

    protected $fillable = [
        'ma_sv',
        'hoTen',
        'ngaySinh',
        'gioiTinh',
        'diaChi',
        'soDienThoai',
        'email',
        'id_lop',
        'anhDaiDien',
        'tinhTrang'
    ];
    protected function lop(){
        return $this->belongsTo(lop::class);
    }
    protected function hocPhi(){
        return $this->hasMany(hocPhi::class);
    }
    protected function bienLai(){
        return $this->hasMany(bienLai::class);
    }
}
