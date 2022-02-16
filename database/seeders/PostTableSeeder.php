<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'First Post',
                'slug' => 'first-post',
                'content' => 'First post content',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Second Post',
                'slug' => 'second-post',
                'content' => 'Second post content',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'Third Post',
                'slug' => 'third-post',
                'content' => 'Third post content',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'title' => 'Fourth Post',
                'slug' => 'fourth-post',
                'content' => 'Fourth post content',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ];

        $posts = Post::insert($posts);

    }
}
