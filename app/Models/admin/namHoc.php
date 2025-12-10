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
        $end   = Carbon::parse($namHoc->getRawNgayKetThuc());

        $currentStart = $start;
        $hocKyIndex = 1;

        // Mỗi học kỳ = 6 tháng
        while (true) {

            $hkStart = $currentStart->copy();
            $hkEnd   = $hkStart->copy()->addMonths(6);

            // Nếu ngày bắt đầu HK > ngày kết thúc năm học -> dừng
            if ($hkStart->greaterThanOrEqualTo($end)) {
                break;
            }

            // Nếu ngày kết thúc HK lớn hơn năm học -> giới hạn lại
            if ($hkEnd->greaterThan($end)) {
                $hkEnd = $end->copy();
            }

            // Tạo học kỳ
            $namHoc->hocKy()->create([
                'tenHocKy'    => "Học kỳ $hocKyIndex",
            ]);

            // Chuẩn bị cho học kỳ tiếp theo
            $hocKyIndex++;
            $currentStart = $hkEnd->copy()->addDay();
        }
    });
}
}