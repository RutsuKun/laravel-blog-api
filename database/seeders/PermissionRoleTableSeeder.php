<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();

        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        Role::findOrFail(2)->permissions()->sync([6, 7]);

        Role::findOrFail(3)->permissions()->sync([6, 8]);

        Role::findOrFail(4)->permissions()->sync([]);
    }
}
