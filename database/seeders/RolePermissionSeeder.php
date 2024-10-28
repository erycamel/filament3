<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $it = Role::query()->where('name', 'IT')->first();
        if ($it) {
            $it->permissions()->sync(Permission::all()->pluck('id')->toArray());
        }
    }
}
