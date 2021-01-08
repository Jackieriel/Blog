@extends('layouts.app')

@section('title')
    User profile
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Edit profile
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$user->name}}">
            </div> 

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}">
            </div> 
         
            
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>  
            
            <div class="form-group">
                <label for="avatar">Upload new avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div> 
            
            <div class="form-group">
                <label for="twitter">Twitter Link:</label>
                <input type="url" name="twitter" class="form-control"  placeholder="Twitter Link" value="{{$user->profile->twitter}}">
            </div>  

            <div class="form-group">
                <label for="facebook">Facebook Link:</label>
                <input type="url" name="facebook" class="form-control"  placeholder="Facebook Link" value="{{$user->profile->facebook}}">
            </div>  

            <div class="form-group">
                <label for="name">Youtube:</label>
                <input type="url" name="youtube" class="form-control"  placeholder="Youtube" value="{{$user->profile->youtube}}">
            </div>  
            
            <div class="form-group">
                <label for="about">Bio:</label>
                <textarea id="about" name="about" cols="6" rows="10" class="form-control"  placeholder="Bio">{{$user->profile->about}}</textarea>
            </div>  

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

@endsection
