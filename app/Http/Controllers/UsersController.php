<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    // inject the admin middleware
    public function __construct()
    {
        $this->middleware('admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
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
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        // Create a profile for the user
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/avater.jpg'
        ]);

        // Set session flash message
        Session::flash('success', 'User created successfully!');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // delete profile
        $user->profile->delete();

        // delete user
        $user->delete();

        // Set session flash message
        Session::flash('success', 'User deleted perminently!');

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::findOrFail($id) ;

        $user->admin = 1;

        $user->save();

         // Set session flash message
         Session::flash('success', 'Successfully changed user permission!');

         return redirect()->back();
    }
    
    public function not_admin($id)
    {
        $user = User::findOrFail($id) ;

        $user->admin = 0;

        $user->save();

         // Set session flash message
         Session::flash('success', 'Successfully changed user permission!');

         return redirect()->back();
    }
}
