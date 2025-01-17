<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagSeeder extends Seeder
{
public function run(): void
{
$posts = Post::all();
$tags = Tag::all();

foreach ($posts as $post) {
$randomTags = $tags->random(2); // Select 2 random tags for each post
$post->tags()->attach($randomTags);
}
}
}