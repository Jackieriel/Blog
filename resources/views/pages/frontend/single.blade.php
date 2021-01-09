@extends('layouts.front')

@section('page-name')
    {{-- {{ $post->slug }} --}}
    test
@endsection


@section('content')


    <!-- Page Content -->

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12 col-md-12">

            <!-- Title -->
            <h1 class="mt-4">{{ $post->slug }}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="">Jackieriel</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ $post->created_at->toFormattedDateString() }} | <a href="">{{ $post->category->name }}</a></p>

            <hr>

            <!-- Preview Image -->
            <div class="text-center">
                <img class="img-fluid rounded" src="{{ $post->featured }}" alt="{{ $post->slug }}">
            </div>

            <hr>

            <!-- Post Content -->
            <div class="lead">
                {!! $post->content !!}
            </div>

            <hr>

            {{-- category --}}
            <div class="widget w-tags">
                <div class="tags-wrap">
                    @foreach ($post->tags as $tag)
                        <a href="#" class="w-tags-item">{{ $tag->tag }}</a>
                    @endforeach
                </div>
            </div>

            {{-- share --}}

            <div class="socials">Share:
                <a href="#" class="social__item">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="#" class="social__item">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="#" class="social__item">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
                <a href="#" class="social__item">
                    <i class="fab fa-google-plus fa-2x"></i>
                </a>
                <a href="#" class="social__item">
                    <i class="fab fa-pinterest fa-2x"></i>
                </a>
            </div>


            <div class="block pt-5">
                <div class="row">
                    <div class=" col-md-2 mx-auto author-image">
                        <img class="img-left" src="{{ asset('uploads/avatar/avater.jpg') }}" alt="Author">
                    </div>

                    <div class="col-md-10">
                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">Philip Demarco</h5>
                                <p class="author-info">SEO Specialist</p>
                            </div>
                            <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                nonummy nibh euismod.
                            </p>
                            <div class="socials">

                                <a href="#" class="social__item">
                                    <i class="fab fa-facebook"></i>
                                </a>

                                <a href="#" class="social__item">
                                    <i class="fab fa-twitter"></i>
                                </a>

                                <a href="#" class="social__item">
                                    <i class="fab fa-google"></i>
                                </a>

                                <a href="#" class="social__item">
                                    <i class="fab fa-youtube"></i>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>



                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        @if ($previous)
                            <a class="page-link" href="{{ route('post.single', $previous->slug) }}">&larr; Previous Post</a>
                        @endif
                    </li>
                    <li class="page-item">
                        @if ($next)
                            <a class="page-link" href="{{ route('post.single', $next->slug) }}">Next Post &rarr;</a>
                        @endif

                    </li>
                </ul>



                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                            var disqus_config = function() {
                                this.page.url =
                                "{{ route('post.single', ['slug' => $post->slug]) }}"; // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier =
                                "post-{{ $post->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document,
                                    s = d.createElement('script');
                                s.src = 'https://devjackieriel.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();

                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
