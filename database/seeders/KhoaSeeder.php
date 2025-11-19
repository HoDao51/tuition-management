<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khoa')->insert([
            [
                'tenKhoa' => 'Kỹ thuật điện',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenKhoa' => 'Năng lượng mới',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
