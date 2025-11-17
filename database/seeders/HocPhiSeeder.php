<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocPhiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hoc_phi')->insert([
            [
                'id_sinh_vien' => 1,
                'id_hoc_ky' => 1,
                'tongTien' => '10000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sinh_vien' => 1,
                'id_hoc_ky' => 2,
                'tongTien' => '14000000',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
