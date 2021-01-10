<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id' , Auth::id())->firstOrFail();

        return view('pages.admin.dashboard')->with('posts_count', Post::all()->count())
        ->with('trashed_count', Post::onlyTrashed()->get()->count())
        ->with('users_count', User::all()->count())
        ->with('categories_count', Category::all()->count())
        ->with('user', $user);
    }
}
