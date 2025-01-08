<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // [
            //     'nama' => '',
            //     'email' => '',
            //     'password' => '',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$/9.3SP3/biUAiH7qvXyZzOLmfOgrb0hdDa5/Olxn4R3DLinmEEJ5a',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Widi',
                'email' => 'widi@gmail.com',
                'password' => '$2y$10$/9.3SP3/biUAiH7qvXyZzOLmfOgrb0hdDa5/Olxn4R3DLinmEEJ5a',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
