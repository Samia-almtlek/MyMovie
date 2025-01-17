<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;
class PostsController extends Controller
{
   
    public function index()
    {
       // جلب المنشورات مع الوسوم المرتبطة
       $posts = Post::with('tags')->get();
       return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // جلب جميع الوسوم
         $tags = Tag::all();
         return view('blog.create', compact('tags'));
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
            'tags' => 'array',
        ]); 
        $slug =Str::slug($request->title, '-');

        $newImageName=uniqid(). '-' .$slug .'.' .$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
       
        $post =Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'my_review'=>$request->input('my_review'),
            'genre'=>$request->input('genre'),
            'release_year'=>$request->input('release_year'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=> auth()->user()->id
        ]); 
        // إرفاق الوسوم
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }


        return redirect('/blog')->with('PostSuccess', 'Post created successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    
    
{
    // جلب المنشور مع التعليقات المرتبطة والمستخدمين الذين كتبوا التعليقات
    $post = Post::where('slug', $slug)
            ->with(['comments.user', 'tags'])
            ->firstOrFail();

        return view('blog.show', compact('post'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->with('tags')->firstOrFail();
        $tags = Tag::all();

        return view('blog.edit', compact('post', 'tags'));
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
            'tags' => 'array',
        ]); 
        $post = Post::where('slug', $slug)->firstOrFail();
        
        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $post->image_path = $newImageName;
        }

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'my_review' => $request->input('my_review'),
            'genre' => $request->input('genre'),
            'release_year' => $request->input('release_year'),
        ]);

        // تحديث الوسوم
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

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