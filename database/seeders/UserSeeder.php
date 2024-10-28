<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'erycamel@gmail.com',
            'password' => bcrypt('password'),
            // "is_active" => 1
        ]);
        // You can also assign multi ple roles at once
        // or as an array
        // $adminUser->assignRole(['IT']);

        $user = User::factory()->create([
            'name' => 'Demo  User',
            'email' => 'demo@deltamas-toyota.co.id',
            'password' => bcrypt('password'),
            // "is_active" => 1
        ]);
        // $user->assignRole(['user']);

        $user = User::factory()->create([
            'name' => 'User 01',
            'email' => 'user@deltamas-toyota.co.id',
            'password' => bcrypt('password'),
            // "is_active" => 0
        ]);
        // $user->assignRole('writer');
    }
}
