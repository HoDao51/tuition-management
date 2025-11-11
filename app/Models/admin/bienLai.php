<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienLai extends Model
{
    /** @use HasFactory<\Database\Factories\BienLaiFactory> */
    use HasFactory;

    protected $table = 'bien_lai';

    protected $fillable = [
        'soBienLai',
        'id_sinh_vien',
        'ngayThu',
        'soTienThu',
        'tinhTrang',
        'nguoiThu'
    ];
    public function sinhVien(){
        return $this->belongsTo(sinhVien::class, 'id_sinh_vien');
    }
    public function nhanVien(){
        return $this->belongsTo(nhanVien::class, 'nguoiThu');
    }
}
