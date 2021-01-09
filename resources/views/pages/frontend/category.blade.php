@extends('layouts.front')

@section('page-name')
    Categories

@endsection


@section('content')


    <!-- Page Content -->

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12 col-md-12">
            <!-- Blog Post -->
            <div class="row">
                @foreach ($category->posts as $post)

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

            </div>

        </div>

    </div>
@endsection
