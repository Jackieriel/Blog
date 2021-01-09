@extends('layouts.front')

@section('page-name')
    Home
@endsection

@section('content')

    <div class="row">
        <div class=" col-md-12 card mx-auto">
            <div class="post-thumb">
                <img class="card-img-top" src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
            </div>
            <div class="card-body">
                <h2 class="card-title">
                    <a href="{{ route('post.single', ['slug' => $first_post->slug]) }}">{{ $first_post->title }}</a></h2>
                <p class="card-text">
                    {!! Str::substr($first_post->content, 0, 150) !!}
                </p>
                <a href="{{ route('post.single', ['slug' => $first_post->slug]) }}" class="btn btn-primary">Read More
                    &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{ $first_post->created_at->diffForHumans() }} |
                <a
                    href="{{ route('category.single', ['id' => $first_post->category->id]) }}">{{ $first_post->category->name }}</a>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <h2 class="my-4">
        {{-- <small>Recent Post</small> --}}
    </h2>

    <!-- Blog Post -->
    <div class="row">
        @foreach ($allPosts as $post)

            <div class="col-md-5 card mx-auto mb-4">
                <div class="post-thumb">
                    <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}">
                </div>
                <div class="card-body post-title">
                    <h1 class="card-title">
                        <a href="{{ route('post.single', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h1>
                    <p class="card-text">
                        {!! Str::substr($post->content, 0, 150) !!}
                    </p>
                    <a href="{{ route('post.single', ['slug' => $post->slug]) }}" class="btn btn-primary">Read More
                        &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at->toFormattedDateString() }} |
                    <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                </div>
            </div>

        @endforeach

    </div>
    {{-- {{ $allPosts->appends(Request::all())->links() }} --}}




    <!-- See more -->
    <div class="pagination justify-content-center mb-4">

        <a class="page-link" href="{{ route('posts') }}"> See more &rarr;</a>
    </div>



    {{-- sidebar enter here --}}


@endsection
