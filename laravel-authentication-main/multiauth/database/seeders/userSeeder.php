<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);
        User::factory()->create([
            'name' => 'vendor',
            'email' => 'vendor@gmail.com',
            'role' => 'vendor',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);
        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer',
            'status' => 'active',
            'password' => Hash::make('1234'),
        ]);

    }
}
