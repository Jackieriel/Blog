@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }} {{$user->name}}
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3 card card-header  text-center">
            <div class="card card-heading bg-success">
                PUBLISHED POSTS
            </div>

            <div class="card card-body">
                <h1>{{$posts_count}}</h1>
            </div>
        </div>

        <div class="col-lg-3 card card-header  text-center">
            <div class="card card-heading bg-danger">
                TRASHED POSTS
            </div>

            <div class="card card-body">
               <h1> {{$trashed_count}}</h1>
            </div>
        </div>

        <div class="col-lg-3 card card-header  text-center">
            <div class="card card-heading bg-info">
                USERS
            </div>

            <div class="card card-body">
                <h1>{{$users_count}}</h1>
            </div>
        </div>

        <div class="col-lg-3 card card-header  text-center">
            <div class="card card-heading bg-primary">
                CATEGORIES
            </div>

            <div class="card card-body">
                <h1>{{$categories_count}}</h1>
            </div>
        </div>
    </div>




@endsection
