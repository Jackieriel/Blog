@extends('layouts.app')

@section('title')
    Update Post
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Update post
        </div>

    </div>

    <div class="card card-body">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control" required>{{$post->content}}</textarea>
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

@endsection
