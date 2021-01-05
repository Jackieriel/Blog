@extends('layouts.app')

@section('title')
    Create Tags
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Create new tag
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('tag.save') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Tag:</label>
                <input type="text" name="tag" class="form-control" required placeholder="Enter tag">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>

@endsection
