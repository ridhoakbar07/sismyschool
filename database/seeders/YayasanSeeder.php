<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yayasans')->insert([
            'id' => Str::uuid(),
            'nama' => 'SIT Al Firdaus',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
