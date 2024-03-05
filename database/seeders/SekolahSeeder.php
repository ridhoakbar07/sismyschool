<?php

namespace Database\Seeders;

use App\Models\Yayasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $yayasan = Yayasan::first();
        
        DB::table('sekolahs')->insert([
            'id' => Str::uuid(),
            'nama' => 'SIT Al Firdaus',
            'alamat' => 'Benua Anyar',
            'unit' => 'utama',
            'yayasan_id' => $yayasan->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
