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
        for ($i = 1; $i <= 6; $i++) {

            DB::table('hoc_ky')->insert([
                'tenHocKy' => 'Học kỳ ' . $i,
                'id_nam_hoc' => 1,
                'deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
