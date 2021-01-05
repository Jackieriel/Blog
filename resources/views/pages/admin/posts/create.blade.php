@extends('layouts.app')

@section('title')
    Create Post
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Create new post
        </div>

    </div>

    <div class="card card-body">
        <form action="{{ route('post.save') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag">Select tag</label>
                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <label for="tags">
                            <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{ $tag->tag }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control" required></textarea>
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>

@endsection
