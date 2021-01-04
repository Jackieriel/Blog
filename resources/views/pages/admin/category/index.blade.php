@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-xs btn-info"><span
                                class="fa fa-pencil text-white"></span></a></td>
                    <td><a href="{{ route('category.delete', $category->id) }}"
                            onclick="return confirm('Do you really want to delete this category?')"
                            class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
