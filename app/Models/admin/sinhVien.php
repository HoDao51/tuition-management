<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class sinhVien extends Model
{
    /** @use HasFactory<\Database\Factories\SinhVienFactory> */
    use HasFactory;

    protected $table = 'sinh_vien';

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

    public function getNgaySinhAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function lop(){
        return $this->belongsTo(lop::class, 'id_lop');
    }
    public function khoa()
    {
    return $this->hasOneThrough(
        khoa::class,  // Model đích
        lop::class,   // Model trung gian
        'id',         // Khóa chính của lop
        'id',         // Khóa chính của khoa
        'id_lop',     // Khóa ngoại trong sinhVien
        'id_khoa'     // Khóa ngoại trong lop
    );
    }
    public function hocPhi(){
        return $this->hasMany(hocPhi::class);
    }
    public function bienLai(){
        return $this->hasMany(bienLai::class);
    }
}
