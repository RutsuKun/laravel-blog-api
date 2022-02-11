<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'email_verified' => true,
                'email_verified_at' => Date::now(),
                'password' => bcrypt('secret123'),
                'remember_token' => null,
                'created_at' => Date::now()
            ],
            [
                'id' => 2,
                'name' => 'Writer User',
                'email' => 'writer@writer.com',
                'email_verified' => true,
                'email_verified_at' => Date::now(),
                'password' => bcrypt('secret123'),
                'remember_token' => null,
                'created_at' => Date::now()
            ],
            [
                'id' => 3,
                'name' => 'Editor User',
                'email' => 'editor@editor.com',
                'email_verified' => true,
                'email_verified_at' => Date::now(),
                'password' => bcrypt('secret123'),
                'remember_token' => null,
                'created_at' => Date::now()
            ],
            [
                'id' => 4,
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified' => false,
                'email_verified_at' => null,
                'password' => bcrypt('secret123'),
                'remember_token' => null,
                'created_at' => Date::now()
            ],
        ];

        User::insert($users);
    }
}
