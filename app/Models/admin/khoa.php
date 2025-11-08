<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    /** @use HasFactory<\Database\Factories\KhoaFactory> */
    use HasFactory;

    protected $fillable = [
        'tenKhoa'
    ];
    protected function lop(){
        return $this->hasMany(lop::class);
    }
}
