<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/7d8493815b.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Toastr styles -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">

        <section class="px-8 py-4">
            <header class="container mx-auto mb-6 flex justify-between align-center">
                <h1>

                    <a href="{{ route('home') }}">
                        <p
                        class="h-16 w-32"
                        >Home</p>
                    </a>

                </h1>



                <h1 class="cursor-pointer">
                    @if (Request::url() == route('register'))
                        <a href="{{ route('login') }}" class="border-slate-800 rounded px-4 py-1 mr-4 text-slate-800">Login</a>
                    @else
                        <a href="{{ route('register') }}" class="border-slate-800 rounded px-4 py-1 mr-4 text-slate-800">Register</a>
                    @endif
                </h1>
            </header>
        </section>

       <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-between">

                    <div class="lg:w-3/6">

                        <img
                        class="object-cover"
                        src="/images/twitter-images.jpg"
                        alt=""
                        >

                    </div>

                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">

                        @yield('content')

                    </div>

                </div>
            </main>
       </section>

    </div>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>
