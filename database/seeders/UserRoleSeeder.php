<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $roles = ['Pimpinan', 'Bendahara', 'Orang Tua', 'Programmer'];

        foreach ($roles as $role) {
            DB::table('user_roles')->insert([
                'id' => Str::uuid(),
                'role' => $role,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
