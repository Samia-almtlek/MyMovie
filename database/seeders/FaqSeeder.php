<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Category;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // افتراض أن هناك فئات مسبقة
        $categories = Category::all();

        // إذا لم توجد فئات، أضف فئات افتراضية أولاً
        if ($categories->isEmpty()) {
            $categories = Category::create([
                ['name' => 'General'],
                ['name' => 'Technical'],
                ['name' => 'Billing'],
                ['name' => 'Account Issues'],
            ]);
        }

        // إضافة أسئلة وأجوبة افتراضية
        $faqs = [
            [
                'question' => 'How do I reset my password?',
                'answer' => 'Click on "Forgot Password" on the login page and follow the instructions.',
                'category_id' => $categories->where('name', 'Account Issues')->first()->id,
            ],
            [
                'question' => 'How do I contact support?',
                'answer' => 'You can contact us via the contact form or by emailing admin@ehb.be',
                'category_id' => $categories->where('name', 'General')->first()->id,
            ],
            [
                'question' => 'How can I share my opinion about a movie?',
                'answer' => 'You can share your opinion by leaving a comment on the movie post. Simply scroll to the bottom of the post, write your comment in the provided text box, and click "Submit".',
                'category_id' => $categories->where('name', 'General')->first()->id,
            ],
            
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate($faq);
        }
    }
}