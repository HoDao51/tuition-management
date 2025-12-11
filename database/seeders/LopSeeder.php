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
                'tenLop' => 'NLM01K36',
                'id_khoa' => 2,
            ],
            [
                'tenLop' => 'KTD01K36',
                'id_khoa' => 1,
            ],
        ]);
    }
}
