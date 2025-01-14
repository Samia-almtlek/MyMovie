<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;





class PagesController extends Controller
{
    /**
     * عرض الصفحة الرئيسية
     */
    public function index()
    {
        
        $latestPost = Post::latest()->first(); // جلب آخر بوست
        return view('index', compact('latestPost')); // إرسال البوست إلى الصفحة
    }
}