<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocKy extends Model
{
    /** @use HasFactory<\Database\Factories\HocKyFactory> */
    use HasFactory;

    protected $table = 'hoc_ky';

    protected $fillable = [
        'tenNamHoc',
        'id_nam_hoc'
    ];

    protected function namHoc(){
        return $this->belongsTo(namHoc::class);
    }
    protected function hocPhi(){
        return $this->hasMany(hocPhi::class);
    }
}
