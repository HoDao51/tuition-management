<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lop')->insert([
            [
                'tenLop' => 'TH18K36',
                'id_khoa' => 1,
            ],
            [
                'tenLop' => 'ND18K36',
                'id_khoa' => 2,
            ],
        ]);
    }
}
