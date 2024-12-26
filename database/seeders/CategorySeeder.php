<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_category')->insert([
            [
                'category_name' => 'LAB1',
            ],
            [
                'category_name' => 'LAB2',
            ]
        ]);
    }
}
