<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class nhanVien extends Model
{
    /** @use HasFactory<\Database\Factories\NhanVienFactory> */
    use HasFactory;

    protected $table = 'nhan_vien';

    protected $fillable = [
        'ma_nv',
        'hoTen',
        'ngaySinh',
        'gioiTinh',
        'chucVu',
        'email',
        'soDienThoai',
        'anhDaiDien',
        'tinhTrang'
    ];
    public function getNgaySinhAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }


    public function hocPhi(){
        return $this->hasMany(hocPhi::class);
    }
    public function bienLai(){
        return $this->hasMany(bienLai::class);
    }


}
