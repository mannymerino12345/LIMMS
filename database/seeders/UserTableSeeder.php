<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=> 'Admin',
                'id_number' => '111',
                'email' => 'mannymerino1@gmail.com',
                'password'=> Hash::make('111'),
                'role' => 'admin',
                'status' => '1',
            ],
            [
                'name'=> 'User',
                'id_number' => '333',
                'email' => 'User@gmail.com',
                'password'=> Hash::make('111'),
                'role' => 'user',
                'status' => '1',
            ],
        ]);
    }
}
