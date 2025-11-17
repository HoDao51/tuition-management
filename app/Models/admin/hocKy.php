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
        'tenHocKy',
        'id_nam_hoc'
    ];

    public function namHoc(){
        return $this->belongsTo(namHoc::class, 'id_nam_hoc');
    }
    public function hocPhi(){
        return $this->hasMany(hocPhi::class, 'id_hoc_ky');
    }
}
