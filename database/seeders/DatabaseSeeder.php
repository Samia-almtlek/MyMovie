<?php

namespace Database\Seeders;
use Database\Seeders\TagSeeder;
use Database\Seeders\ْUserSeeder;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            FaqSeeder::class,
            CommentSeeder::class,
            PostTagSeeder::class,
        ]);
    }
}