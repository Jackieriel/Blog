<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0) {
            Session::flash('info', 'You must have a categories and tags before attempting to create a post.');

            return redirect()->back();
        }

        return view('pages.admin.posts.create')->with('categories', $categories)->with('tags', $tags);
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
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;

        // New name to the image
        $featured_new_name = time() . $featured->getClientOriginalName();

        // move file to public assets
        $featured->move('uploads/posts', $featured_new_name);

        // Save the rest of the content
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
        ]);

        // post to pivot table
        $post->tags()->attach($request->tags);



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
    public function edit(Post $post, $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.admin.posts.update')->with('post', $post)
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {
        // Validate data pass
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required|min:20',
            'category_id' => 'required'
        ]);

        // find the post
        $post = Post::findOrFail($id);

        // check if user upload image
        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        // Save post
        $post->save();

        // to save the tags
        $post->tags()->sync($request->tags);

        // Flash message
        Session::flash('success', 'Post updated successfully!');

        // redirect
        return redirect()->route('posts');
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

        $post->delete();

        Session::flash('success', 'Post trashed successfully!');

        return redirect()->back();
    }

    // Return deleting page
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('pages.admin.posts.trash')->with('posts', $posts);
    }

    // Permenently delete post
    public function kill(Post $post, $id)
    {
        $post = Post::withTrashed()->where('id', $id)->findOrFail($id);


        $post->forceDelete();

        Session::flash('success', 'Post permenently deleted successfully!');

        return redirect()->route('trashed');
    }

    // Restore postt

    public function restore(Post $post, $id)
    {
        $post = Post::withTrashed()->where('id', $id)->findOrFail($id);


        $post->restore();

        Session::flash('success', 'Post restored successfully!');

        return redirect()->route('posts');
    }
}
