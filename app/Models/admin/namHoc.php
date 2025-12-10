<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class namHoc extends Model
{
    use HasFactory;

    protected $table = 'nam_hoc';

    protected $fillable = [
        'tenNamHoc',
        'ngayBatDau',
        'ngayKetThuc'
    ];

    /**
     * ACCESSORS — chuyển thành dd-mm-YYYY khi hiển thị
     */
    public function getNgayBatDauAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayKetThucAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * RAW GETTERS — dùng cho xử lý nội bộ (tạo học kỳ)
     */
    public function getRawNgayBatDau()
    {
        return $this->attributes['ngayBatDau'];
    }

    public function getRawNgayKetThuc()
    {
        return $this->attributes['ngayKetThuc'];
    }

    /**
     * RELATIONSHIPS
     */
    public function hocKy()
    {
        return $this->hasMany(hocKy::class, 'id_nam_hoc');
    }

    public function sinhVien()
    {
        return $this->hasMany(sinhVien::class, 'id_nam_hoc');
    }

    /**
     * AUTO-GENERATE 6 SEMESTERS (HỌC KỲ) WHEN NAM HOC CREATED
     */
    protected static function booted()
    {
        static::created(function ($namHoc) {

            $start = Carbon::parse($namHoc->getRawNgayBatDau());

            // Tạo 6 học kỳ — mỗi học kỳ dài 5 tháng
            for ($i = 1; $i <= 6; $i++) {

                $hkStart = $start->copy()->addMonths(($i - 1) * 5);
                $hkEnd   = $hkStart->copy()->addMonths(5)->subDay();

                $namHoc->hocKy()->create([
                    'tenHocKy'     => "Học kỳ $i",
                ]);
            }
        });
    }
}