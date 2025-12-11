<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

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
        'tinhTrang',
        'user_id'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
