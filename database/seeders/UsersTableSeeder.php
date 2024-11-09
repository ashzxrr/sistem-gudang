<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB :: table('users')->insert ([
            'nama' => str::random(20),
            'email' => str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);

      
    }
}
