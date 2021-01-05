@extends('layouts.app')

@section('title')
    Update Tags
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            udate tag
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Tag:</label>
                <input type="text" name="tag" value="{{$tag->tag}}" class="form-control" required placeholder="Enter tag">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

@endsection
