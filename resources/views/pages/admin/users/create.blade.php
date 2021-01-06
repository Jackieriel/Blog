@extends('layouts.app')

@section('title')
    Create User
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Create new user
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('user.save') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter Email">
            </div> 
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter Name">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>

@endsection
