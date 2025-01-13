<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // إنشاء الكاتيجوري
        Category::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Category added successfully!');
    }
}