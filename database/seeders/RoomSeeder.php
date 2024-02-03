<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Bedroom',
                'description' => 'Bedroom',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Living room',
                'description' => 'Living room',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kitchen',
                'description' => 'Kitchen',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dining',
                'description' => 'Dining',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bathroom',
                'description' => 'Bathroom',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
