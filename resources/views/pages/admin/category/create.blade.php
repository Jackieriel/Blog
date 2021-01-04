@extends('layouts.app')

@section('title')
    Create Category
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Create new categroy
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('category.save') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Catergory:</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter category">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>

@endsection
