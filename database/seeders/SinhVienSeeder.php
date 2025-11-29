<?php

namespace Database\Seeders;

use App\Models\Admin\sinhVien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SinhVienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for ($i = 1; $i <= 30; $i++) {

            $name = $faker->name;

            // Tạo user trước
            $userId = DB::table('users')->insertGetId([
                'name'       => $name,
                'email'      => "sinhvien{$i}@gmail.com",
                'password'   => Hash::make('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Tạo sinh viên
            DB::table('sinh_vien')->insert([
                'ma_sv'        => 'SV' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'hoTen'        => $name,
                'ngaySinh'     => $faker->date('Y-m-d', '2010-01-01'),
                'gioiTinh'     => $faker->randomElement([0, 1]),
                'diaChi'       => $faker->city,
                'soDienThoai'  => $faker->numerify($faker->randomElement(['09########', '03########', '08########'])),
                'email'        => "sinhvien{$i}@gmail.com",
                'anhDaiDien'   => null,
                'id_lop'       => $faker->randomElement([1, 2]),
                'id_nam_hoc'   => 1,
                'user_id'      => $userId,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]);
        }
    }
}
