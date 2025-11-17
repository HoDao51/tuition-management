<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NamHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nam_hoc')->insert([
            'tenNamHoc' => '2024-2027',
            'ngayBatDau' => '2024-11-02',
            'ngayKetThuc' => '2027-11-02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
