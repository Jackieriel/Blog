@extends('layouts.app')

@section('title')
    Tags
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
            <th>Tag Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>
            @if ($tags->count() > 0)
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td><a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-xs btn-info"><span
                                    class="fa fa-pencil text-white"></span></a></td>
                        <td><a href="{{ route('tag.delete', $tag->id) }}"
                                onclick="return confirm('Do you really want to delete this tag?')"
                                class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No tags yet</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
