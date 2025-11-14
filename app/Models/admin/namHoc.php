<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class namHoc extends Model
{
    /** @use HasFactory<\Database\Factories\NamHocFactory> */
    use HasFactory;

    protected $table = 'nam_hoc';

    protected $fillable = [
        'tenNamHoc',
        'ngayBatDau',
        'ngayKetThuc'
    ];

    public function getNgayBatDauAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayKetThucAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function hocKy(){
        return $this->hasMany(hocKy::class, 'id_nam_hoc');
    }
    public function sinhVien(){
        return $this->hasMany(sinhVien::class, 'id_nam_hoc');
    }
}
