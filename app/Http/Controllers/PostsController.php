<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostsController extends Controller
{
   
    public function index()
    {
        
        return view('blog.index')
        ->with('posts',Post::get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

      $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048',  // image validation
            'genre' => 'required|max:100',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'my_review' => 'required|max:1000', // Optional field
        ]); 
        $slug =Str::slug($request->title, '-');

        $newImageName=uniqid(). '-' .$slug .'.' .$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
       
        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'my_review'=>$request->input('my_review'),
            'genre'=>$request->input('genre'),
            'release_year'=>$request->input('release_year'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=> auth()->user()->id
        ]); 

        return redirect('/blog')->with('success', 'Post created successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}