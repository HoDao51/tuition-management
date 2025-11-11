<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    /** @use HasFactory<\Database\Factories\KhoaFactory> */
    use HasFactory;

    protected $table = 'khoa';

    protected $fillable = [
        'tenKhoa'
    ];
    public function lop(){
        return $this->hasMany(lop::class);
    }
}
