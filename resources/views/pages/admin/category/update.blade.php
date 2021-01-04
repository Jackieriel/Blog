@extends('layouts.app')

@section('title')
    Update Category
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Update categroy
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Catergory:</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" required placeholder="Enter category">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

@endsection
