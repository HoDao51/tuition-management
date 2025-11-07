<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    /** @use HasFactory<\Database\Factories\LopFactory> */
    use HasFactory;

    protected $filltable = [
        'tenLop',
        'id_khoa'
    ];
    protected function khoa(){
        return $this->belongsTo(khoa::class);
        return $this->hasMany(sinhVien::class);
    }
}
