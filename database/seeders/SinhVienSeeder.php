<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sinh_vien')->insert([
            'ma_sv' => 'SV001',
            'hoTen' => 'Nguyễn Sỹ Khánh Anh',
            'ngaySinh' => '2006/01/01',
            'gioiTinh' => 0,
            'diaChi' => 'Ha Noi',
            'soDienThoai' => '0123456',
            'email' => 'anh@gmail.com',
            'id_lop' => 1,
            'id_nam_hoc' => 1,
            'tinhTrang' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
