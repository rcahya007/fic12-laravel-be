<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make a seeder to table categories with multiple records

        DB::table('categories')->insert([
            [
                'name' => 'Wardrobes',
                'room_id' => 1,
                'description' => 'Wardrobes Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Beds',
                'room_id' => 1,
                'description' => 'Beds Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mattresses and accessories',
                'room_id' => 1,
                'description' => 'Mattresses and accessories Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bedlinen',
                'room_id' => 1,
                'description' => 'Bedlinen Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sofas and armchairs',
                'room_id' => 2,
                'description' => 'Sofas and armchairs Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Living room tables',
                'room_id' => 2,
                'description' => 'Living room tables Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Buffet cabinets',
                'room_id' => 2,
                'description' => 'Buffet cabinets Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Wall storage',
                'room_id' => 2,
                'description' => 'Wall storage Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kitchen cabinets',
                'room_id' => 3,
                'description' => 'Kitchen cabinets Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kitchen accessories',
                'room_id' => 3,
                'description' => 'Kitchen accessories Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kitchen sinks and taps',
                'room_id' => 3,
                'description' => 'Kitchen sinks and taps Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cookware',
                'room_id' => 3,
                'description' => 'Cookware Products',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Dining chairs',
                'room_id' => 4,
                'description' => 'Dining chairs Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dining room tables',
                'room_id' => 4,
                'description' => 'Dining room tables Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tableware',
                'room_id' => 4,
                'description' => 'Tableware Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Table setting',
                'room_id' => 4,
                'description' => 'Table setting Products',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Bathroom furniture',
                'room_id' => 5,
                'description' => 'Bathroom furniture Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bathroom accessories',
                'room_id' => 5,
                'description' => 'Bathroom accessories Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bathroom fixtures and fittings',
                'room_id' => 5,
                'description' => 'Bathroom fixtures and fittings Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bathroom textiles',
                'room_id' => 5,
                'description' => 'Bathroom textiles Products',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
