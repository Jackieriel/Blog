<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count()==0)
        {
            Session::flash('info', 'You must have a categories before attempting to create a post.');
        }
        
        return view('pages.admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required|min:20',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;

        // New name to the image
        $featured_new_name = time().$featured->getClientOriginalName();

        // move file to public assets
        $featured->move('uploads/posts', $featured_new_name);

        // Save the rest of the content
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' =>'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title)
        ]);

        // Set session flash message
        Session::flash('success', 'Post created successfully!');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::findOrFail($id);

        $post -> delete();

        Session::flash('success', 'Post trashed successfully!');

        return redirect()->back();

    }
}
