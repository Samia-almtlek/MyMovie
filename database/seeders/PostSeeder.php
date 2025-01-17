<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Platform',
                'slug' => 'the-platform',
                'description' => 'The Platform 2" continues the harrowing journey in the vertical prison where survival is tested by a cruel system. As new characters emerge, the movie delves deeper into the ethical dilemmas of scarcity, solidarity, and humanitys resilience in the face of adversity.',
                'my_review' => 'The Platform" is a gripping and thought-provoking film that masterfully explores societal inequalities. The claustrophobic setting and intense pacing kept me hooked throughout. Gorengs moral struggles were both relatable and haunting, showcasing the lengths people go to survive. While the ambiguous ending may not satisfy everyone, I found it fitting and reflective. It is a unique thriller that challenges viewers to question their own ethics. I do rate it 9/10 for its originality and powerful message',
                'image_path' => 'default.jpg',
                'genre' => 'Horror',
                'release_year' =>  2019,
                'user_id' => 1, // Assuming User ID 1 exists
            ],
            [
                'title' => 'The Platform 2',
                'slug' => 'the-platform-2',
                'description' => 'The Platform 2" continues the harrowing journey in the vertical prison where survival is tested by a cruel system. As new characters emerge, the movie delves deeper into the ethical dilemmas of scarcity, solidarity, and humanitys resilience in the face of adversity.

',
                'my_review' => 'The sequel expands on the thought-provoking themes of its predecessor, offering a darker and more intense perspective. It challenges viewers to reflect on societal inequalities and the moral compromises people make under pressure.

I do rate it 7/10 for its originality.',
                'image_path' => 'default.jpg',
                'genre' => 'Drama',
                'release_year' => 2024,
                'user_id' => 1, // Assuming User ID 1 exists
            ],
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}