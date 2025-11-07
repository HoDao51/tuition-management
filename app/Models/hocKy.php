<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocKy extends Model
{
    /** @use HasFactory<\Database\Factories\HocKyFactory> */
    use HasFactory;

    protected $filltable = [
        'tenNamHoc',
        'id_nam_hoc'
    ];

    protected function namHoc(){
        return $this->belongsTo(namHoc::class);
        return $this->hasMany(hocPhi::class);
    }
}
