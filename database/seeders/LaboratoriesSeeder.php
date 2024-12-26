<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laboratories')->insert([
            [
                'lab_name' => 'lab 1',
                'lab_image' => 'upload/laboratory_images/202412061228_Screenshot 2024-09-08 215131.png',
            ],
            [
                'lab_name' => 'lab 2',
                'lab_image' => 'upload/laboratory_images/202412061228_Screenshot 2024-09-08 215131.png',
            ],
            [
                'lab_name' => 'lab 3',
                'lab_image' => 'upload/laboratory_images/202412061228_Screenshot 2024-09-08 215131.png',
            ]
        ]);
    }
}
