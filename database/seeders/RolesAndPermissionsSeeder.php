<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // create roles and assign created permissions
        // this can be done as separate statements
        $role = Role::findByName('IT');
        $role->givePermissionTo(Permission::all());
    }
}