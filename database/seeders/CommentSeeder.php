<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        // Retrieve all posts and users
        $posts = Post::all();
        $users = User::all();

        // Check if there are any posts and users
        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->info('No posts or users found. Please seed posts and users first.');
            return;
        }

        // Create default comments
        foreach ($posts as $post) {
            foreach ($users as $user) {
                Comment::create([
                    'body' => 'This is a comment on post ID ' . $post->id . ' by user ID ' . $user->id,
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}