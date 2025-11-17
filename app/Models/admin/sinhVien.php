<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

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
        'id_nam_hoc',
        'anhDaiDien',
        'tinhTrang',
        'user_id'
    ];

    public function getNgaySinhAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function lop(){
        return $this->belongsTo(lop::class, 'id_lop');
    }

    public function namHoc(){
        return $this->belongsTo(namHoc::class, 'id_nam_hoc');
    }

    public function hocPhi(){
        return $this->hasMany(hocPhi::class, 'id_sinh_vien');
    }
    public function bienLai(){
        return $this->hasMany(bienLai::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
