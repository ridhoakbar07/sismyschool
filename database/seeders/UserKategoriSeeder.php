<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $kategoris = ['Pimpinan', 'Bendahara', 'Orang Tua', 'Programmer'];

        foreach ($kategoris as $kategori) {
            DB::table('user_kategoris')->insert([
                'id' => Str::uuid(),
                'kategori' => $kategori,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
