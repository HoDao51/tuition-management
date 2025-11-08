<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    /** @use HasFactory<\Database\Factories\LopFactory> */
    use HasFactory;

    protected $fillable = [
        'tenLop',
        'id_khoa'
    ];
    protected function khoa(){
        return $this->belongsTo(khoa::class);
    }
    protected function sinhVien(){
        return $this->hasMany(sinhVien::class);
    }
}
