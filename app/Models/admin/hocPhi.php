<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocPhi extends Model
{
    /** @use HasFactory<\Database\Factories\HocPhiFactory> */
    use HasFactory;

    protected $table = 'hoc_phi';

    protected $fillable = [
        'id_sinh_vien',
        'id_hoc_ky',
        'tongTien',
        'soTienDaThanhToan',
        'tinhTrang',
        'nguoiTao'
    ];
    public function sinhVien(){
        return $this->belongsTo(sinhVien::class, 'id_sinh_vien');
    }
    public function hocKy(){
        return $this->belongsTo(hocKy::class, 'id_hoc_ky');
    }
    public function nhanVien(){
        return $this->belongsTo(nhanVien::class, 'nguoiTao');
    }
    public function bienLai(){
        return $this->hasMany(bienLai::class, 'id_hoc_phi');
    }
}
