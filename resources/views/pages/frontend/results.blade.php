@extends('layouts.front')

@section('page-name')
    {{ $query }}

@endsection


@section('content')

    <h1>test</h1>
    <!-- Page Content -->

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12 col-md-12">
            <!-- Blog Post -->
            <div class="row">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)

                        <div class="col-md-5 card mx-auto mb-4">
                            <div class="post-thumb">
                                <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}">
                            </div>
                            <div class="card-body post-title">


                                <a href="{{ route('post.single', ['slug' => $post->slug]) }}">
                                    <p class="text-muted">{{ $post->title }}</p>
                                </a>
                            </div>

                        </div>

                    @endforeach
                @else
                        <h2>No result found</h2>
                @endif

            </div>

        </div>

    </div>
@endsection
