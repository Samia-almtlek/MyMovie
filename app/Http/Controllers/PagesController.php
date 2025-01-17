<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;





class PagesController extends Controller
{
    /**
     * view index page
     */
    public function index()
    {
        
        $latestPost = Post::latest()->first(); // fetch the last post
        return view('index', compact('latestPost')); //   send post 
    }
    
}