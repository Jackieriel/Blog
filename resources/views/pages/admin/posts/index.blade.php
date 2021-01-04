@extends('layouts.app')

@section('title')
    All Post
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            All post
        </div>

        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Update</th>
                 <th>Delete</th>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50" ></td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-info"><span
                            class="fa fa-pencil text-white"></span></a>
                        </td>
                        <td>
                            <a href="{{ route('post.delete', $post->id) }}"
                            onclick="return confirm('Do you really want to delete this category?')"
                            class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

   
  

@endsection
