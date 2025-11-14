<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocKySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hoc_ky')->insert([
            [
                'tenHocKy' => 'Học kỳ 1',
                'id_nam_hoc' => 1,
                'deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenHocKy' => 'Học kỳ 2',
                'id_nam_hoc' => 1,
                'deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
