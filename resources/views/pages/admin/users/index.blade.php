@extends('layouts.app')

@section('title')
    All Users
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            All user
        </div>

        <table class="table table-hover">
            <thead>
                <th>Name</th>
                <th>Image</th>
                <th>Permission</th>
                <th>Delete</th>
            </thead>

            <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>
                            <td><a href="">Permission</a></td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                @else
                        <tr>
                            <td colspan="5" class="text-center">No users</td>
                        </tr>
                @endif
            </tbody>

        </table>

    </div>




@endsection