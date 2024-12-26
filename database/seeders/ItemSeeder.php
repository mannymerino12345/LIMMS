<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 2',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 3',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 4',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 5',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 6',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 7',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 8',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 9',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 10',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 11',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ],
            [
                'item_image' => 'upload/item_images/202412061233_Screenshot 2024-09-08 214944.png',
                'laboratory_id' => 1,
                'item_name' => 'Item 12',
                'item_description' => 'This is item 1',
                'quantity' => '123',
                'category_id' => 1,
                'days' => 3,
            ]
        ]);
    }
}
