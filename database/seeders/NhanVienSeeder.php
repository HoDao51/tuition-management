<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = DB::table('users')->insertGetId([
            'name'       => 'Trần Đức Hiếu',
            'email'      => 'hieu@gmail.com',
            'password'   => Hash::make('123456'),
            'role' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('nhan_vien')->insert([
            'ma_nv'        => 'NV001',
            'hoTen'        => 'Trần Đức Hiếu',
            'ngaySinh'     => '2006-01-01',
            'gioiTinh'     => 0,
            'chucVu' => 0,
            'soDienThoai'  => '0901123123',
            'email'        => 'hieu@gmail.com',
            'anhDaiDien'   => null,
            'user_id'      => $user1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name'       => 'Ngô Việt Anh',
            'email'      => 'anh@gmail.com',
            'password'   => Hash::make('123456'),
            'role' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('nhan_vien')->insert([
            'ma_nv'        => 'NV002',
            'hoTen'        => 'Ngô Việt Anh',
            'ngaySinh'     => '2006-01-01',
            'gioiTinh'     => 0,
            'chucVu' => 1,
            'soDienThoai'  => '0901456789',
            'email'        => 'anh@gmail.com',
            'anhDaiDien'   => null,
            'user_id'      => $user2,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
