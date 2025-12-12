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
    public function regenerateHocKy()
    {
        // Kiểm tra an toàn: nếu có học phí thì KHÔNG xóa
        if ($this->hocKy()->whereHas('hocPhi', function ($q) {
            $q->where('deleted', false);
        })->exists()) {
            throw new \Exception('Không thể xóa hoặc tạo lại học kỳ vì đã có học phí!');
        }

        // xóa
        $this->hocKy()->delete();

        $start = Carbon::parse($this->getRawNgayBatDau());
        $end   = Carbon::parse($this->getRawNgayKetThuc());

        $currentStart = $start->copy();
        $hocKyIndex = 1;

        while (true) {

            // Nếu thời gian còn lại < 6 tháng thì dừng
            if ($currentStart->diffInMonths($end, false) < 6) {
                break;
            }

            $hkStart = $currentStart->copy();
            $hkEnd   = $hkStart->copy()->addMonths(6);

            if ($hkEnd->greaterThan($end)) {
                $hkEnd = $end->copy();
            }

            $this->hocKy()->create([
                'tenHocKy' => "Học kỳ $hocKyIndex",
            ]);

            $hocKyIndex++;
            $currentStart = $hkEnd->copy();
        }
    }

    protected static function booted()
    {
        static::created(function ($namHoc) {
            $namHoc->regenerateHocKy();
        });

        static::updated(function ($namHoc) {

            if ($namHoc->wasChanged(['ngayBatDau', 'ngayKetThuc'])) {
                $namHoc->regenerateHocKy();
            }
        });
    }
}