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

        return redirect('/blog')->with('PostSuccess', 'Post created successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    
    
{
    // جلب المنشور مع التعليقات المرتبطة والمستخدمين الذين كتبوا التعليقات
    $post = Post::where('slug', $slug)
                ->with('comments.user') // جلب التعليقات والمستخدمين المرتبطين بها
                ->firstOrFail();

    // إرسال البيانات إلى العرض
    return view('blog.show', ['post' => $post]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

    // Check if the user is admin and the owner of the post
    if (!auth()->user()->is_admin || auth()->user()->id != $post->user_id) {
        abort(403, 'Unauthorized action.');
    }

    return view('blog.edit')->with('post', $post);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048',  // image validation
            'genre' => 'required|max:100',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'my_review' => 'required|max:1000', // Optional field
        ]); 
        

        $newImageName=uniqid(). '-' .$slug .'.' .$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
       
        
        Post::where('slug',$slug)
        ->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'my_review'=>$request->input('my_review'),
            'genre'=>$request->input('genre'),
            'release_year'=>$request->input('release_year'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=> auth()->user()->id
        ]); 

        return redirect()->route('blog.show', $slug)->with('EditSuccess', 'Successfully updated');
        
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        Post::where('slug',$slug)->delete();
        return redirect('/blog')->with('DeleteSuccess', 'Post Deleted successfully!');


    }
}