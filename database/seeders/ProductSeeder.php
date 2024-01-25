<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make a seeder to table products with multiple records
        DB::table('products')->insert([
            [
                'name' => 'Keyboard',
                'category_id' => 1,
                'description' => 'Keyboard for gaming',
                'price' => 320000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Earphone',
                'category_id' => 1,
                'description' => 'Earphone for gaming',
                'price' => 320000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sepatu Nike',
                'category_id' => 2,
                'description' => 'Sepatu nike',
                'price' => 2200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sepatu Nike 2',
                'category_id' => 2,
                'description' => 'Sepatu nike 2',
                'price' => 2200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Macbook 1',
                'category_id' => 3,
                'description' => 'Macbook 1',
                'price' => 12200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Macbook 2',
                'category_id' => 3,
                'description' => 'Macbook 2',
                'price' => 12200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Macbook 3',
                'category_id' => 4,
                'description' => 'Macbook 3',
                'price' => 12200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Macbook 4',
                'category_id' => 4,
                'description' => 'Macbook 4',
                'price' => 12200000,
                'stock' => 10,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
