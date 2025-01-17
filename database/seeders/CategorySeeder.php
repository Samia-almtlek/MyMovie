<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['General', 'Technical', 'Billing', 'Account Issues'];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}