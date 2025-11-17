<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ================== SINH VIÊN 1: Trần Thái Vũ ==================
        $user1 = DB::table('users')->insertGetId([
            'name'       => 'Trần Thái Vũ',
            'email'      => 'tranthaivu@gmail.com',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('sinh_vien')->insert([
            'ma_sv'        => 'SV001',
            'hoTen'        => 'Trần Thái Vũ',
            'ngaySinh'     => '2006-01-01',
            'gioiTinh'     => 0,
            'diaChi'       => 'Hà Nội',
            'soDienThoai'  => '0912345678',
            'email'        => 'tranthaivu@gmail.com',
            'anhDaiDien'   => null,
            'id_lop'       => 1, 
            'id_nam_hoc'   => 1,
            'user_id'      => $user1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);


        // ================== SINH VIÊN 2: Nguyễn Sỹ Khánh Anh ==================
        $user2 = DB::table('users')->insertGetId([
            'name'       => 'Nguyễn Sỹ Khánh Anh',
            'email'      => 'khanhanh@gmail.com',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('sinh_vien')->insert([
            'ma_sv'        => 'SV002',
            'hoTen'        => 'Nguyễn Sỹ Khánh Anh',
            'ngaySinh'     => '2006-01-01',
            'gioiTinh'     => 0,
            'diaChi'       => 'california',
            'soDienThoai'  => '0988776655',
            'email'        => 'khanhanh@gmail.com',
            'anhDaiDien'   => null,
            'id_lop'       => 1, 
            'id_nam_hoc'   => 1,
            'user_id'      => $user2,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
