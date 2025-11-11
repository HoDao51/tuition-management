<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

    public function hocKy(){
        return $this->hasMany(hocKy::class);
    }
}
