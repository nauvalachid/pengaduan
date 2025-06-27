<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->where('email', 'admin@admin.com')->delete();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin890'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
