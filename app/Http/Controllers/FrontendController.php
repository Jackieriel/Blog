<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::all()->take(4);
        $allPosts = Post::with('category')->orderBy('created_at', 'desc')
                                                                               
                                        ->skip(1)
                                        ->take(5)
                                        ->get();
                                        

        return view('pages.frontend.index')
                ->with('title', Setting::first()->site_name)
                ->with('categories', $categories)
                ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                ->with('allPosts', $allPosts);
    }
}
