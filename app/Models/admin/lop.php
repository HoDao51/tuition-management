<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    /** @use HasFactory<\Database\Factories\LopFactory> */
    use HasFactory;

    protected $table = 'lop';

    protected $fillable = [
        'tenLop',
        'id_khoa'
    ];
    public function khoa(){
        return $this->belongsTo(khoa::class, 'id_khoa');
    }
    public function sinhVien(){
        return $this->hasMany(sinhVien::class);
    }
}
