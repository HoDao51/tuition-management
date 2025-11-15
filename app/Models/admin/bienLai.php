<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienLai extends Model
{
    /** @use HasFactory<\Database\Factories\BienLaiFactory> */
    use HasFactory;

    protected $table = 'bien_lai';

    protected $fillable = [
        'soBienLai',
        'ngayThu',
        'soTienThu',
        'id_hoc_phi',
        'tinhTrang',
        'nguoiThu'
    ];
    public function nhanVien(){
        return $this->belongsTo(nhanVien::class, 'nguoiThu');
    }

    public function hocPhi(){
        return $this->belongsTo(HocPhi::class, 'id_hoc_phi');
    }
}
