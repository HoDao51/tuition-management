<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocPhi extends Model
{
    /** @use HasFactory<\Database\Factories\HocPhiFactory> */
    use HasFactory;

    protected $fillable = [
        ' id_sinh_vien',
        ' id_hoc_ky',
        ' soTienHocPhi',
        ' tinhTrang',
        ' nguoiTao'
    ];
    protected function sinhVien(){
        return $this->belongsTo(sinhVien::class);
    }
    protected function hocKy(){
        return $this->belongsTo(hocKy::class);
    }
    protected function nhanVien(){
        return $this->belongsTo(nhanVien::class);
    }
}
