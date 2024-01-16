<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(9)->create();

        $user = User::factory()->create([
            'name' => 'Admin Rendy',
            'email' => 'rendytesting@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '081238767481',
            'roles' => 'ADMIN'
        ]);
    }
}
