<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"> 


    <script src="https://kit.fontawesome.com/db163c922e.js" crossorigin="anonymous"></script>

    @yield('styles')

</head>

<body>

    <div id="app">
        <x-navbar />

        <div class="container py-4">
            <div class="row">
                @if (Auth::check())
                    <div class="col-lg-4">
                        <x-sidebar />
                    </div>
                @endif

                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>



    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    
    <x-notification />
    
    @yield('scripts')

</body>

</html>
