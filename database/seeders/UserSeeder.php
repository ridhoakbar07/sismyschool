<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'role' => 'Admin',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //orangtua
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Orang Tua Murid',
            'email' => 'orangtua@mail.com',
            'email_verified_at' => now(),
            'role' => 'Orang Tua',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //yayasan
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Ketua Yayasan',
            'email' => 'yayasan@mail.com',
            'email_verified_at' => now(),
            'role' => 'Ketua Yayasan',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
