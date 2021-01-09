@extends('layouts.app')

@section('title')
    Site Settings
@endsection

@section('content')
    <x-errors />

    <div class="card">
        <div class="card-header">
            Edit blog settings
        </div>

    </div>

    <div class="card card-body"> 
        <form action="{{ route('settings.update') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}" required placeholder="Site Name">
            </div> 

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}" required placeholder="Contact Number">
            </div> 
            
            <div class="form-group">
                <label for="name">Contact Email:</label>
                <input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}" required placeholder="Email">
            </div>     
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{$settings->address}}" required placeholder="Address">
            </div> 

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

@endsection
