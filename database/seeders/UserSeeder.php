<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Role 'writer','admin'
        $role = Role::create(['name'=> 'writer']);
        $role = Role::create(['name'=> 'admin']);

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'erycamel@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '082276520028'
            // "is_active" => 1
        ]);

        // You can also assign multiple roles at once
        // or as an array
        $adminUser->assignRole(['writer', 'admin']);

        $user = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@deltamas-toyota.co.id',
            'password' => bcrypt('password'),
            'role' => 'user',
            'status' => 'active',
            'phone' => '082160457737'
            // "is_active" => 1
        ]);
        $user->assignRole(['writer']);

        $user = User::factory()->create([
            'name' => 'User 01',
            'email' => 'user@deltamas-toyota.co.id',
            'password' => bcrypt('password'),
            'role' => 'user',
            'status' => 'active',
            'phone' => '082276115802'
            // "is_active" => 0
        ]);
        $user->assignRole('writer');
    }
}
