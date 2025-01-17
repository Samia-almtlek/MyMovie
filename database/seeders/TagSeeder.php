<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Action', 'Drama', 'Comedy', 'Horror', 'Sci-Fi'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}