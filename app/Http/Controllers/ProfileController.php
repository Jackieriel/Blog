<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $user = Auth::user();

        return view('pages.admin.users.profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required|email',
            'twitter' => 'required|url',
            'facebook' => 'required|url',
            'youtube' => 'url',
            'about' =>'required'
        ]);

        $user = Auth::user();

        // check if it has file
        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatar', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatar/'.$avatar_new_name;

            // save the profile
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->twitter = $request->twitter;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;
        
        $user->save();

        $user->profile->save();

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        // Set session flash message
        Session::flash('success', 'Profile created successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
