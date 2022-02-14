<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'users:access',
            ],
            [
                'id' => 2,
                'title' => 'users:read',
            ],
            [
                'id' => 3,
                'title' => 'users:write',
            ],
            [
                'id' => 4,
                'title' => 'users:update',
            ],
            [
                'id' => 5,
                'title' => 'posts:access',
            ],
            [
                'id' => 6,
                'title' => 'posts:read',
            ],
            [
                'id' => 7,
                'title' => 'posts:write',
            ],
            [
                'id' => 8,
                'title' => 'posts:update',
            ],
            [
                'id' => 9,
                'title' => 'permissions:access',
            ],
            [
                'id' => 10,
                'title' => 'roles:access',
            ],
        ];

        Permission::insert($permissions);
    }
}
