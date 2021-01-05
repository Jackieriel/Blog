@extends('layouts.app')

@section('title')
    Trashed Post
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Trashed post
        </div>

        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Update</th>
                <th>Restore</th>
                <th>Destory </th>
            </thead>

            <tbody>
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50"></td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-info"><span
                                        class="fa fa-pencil text-white"></span></a>
                            </td>
                            <td>
                                <a href="{{ route('post.restore', $post->id) }}"
                                    onclick="return confirm('Do you really want to restore this category?')"
                                    class="btn btn-xs btn-success"><span class="fas fa-trash-restore text-white"></span></a>
                            </td>
                            <td>
                                <a href="{{ route('post.kill', $post->id) }}"
                                    onclick="return confirm('Do you really want to delete this category?')"
                                    class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                     <tr>
                         <td colspan="5" class="text-center">No trashed posts</td>
                    </tr>   
                @endif
            </tbody>

        </table>

    </div>




@endsection
