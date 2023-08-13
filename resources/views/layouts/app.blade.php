<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')

</head>

<body>
    <div id="app">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-2">
                <div class="flex justify-between items-center">
                    <a href="{{ url('/') }}" class="text-lg font-semibold">{{ config('app.name', 'Laravel') }}</a>

                    <div class="md:hidden">
                        <button class="text-gray-500">
                            <!-- Add some form of icon or visual for toggling menu in mobile. You can use a library like Heroicons. -->
                        </button>
                    </div>

                    <div class="hidden md:flex items-center">
                        <!-- Left Side Of Navbar -->

                        <!-- Right Side Of Navbar -->
                        <div class="ml-auto space-x-4">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">{{ __('Login')
                                }}</a>
                            @endif

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">{{
                                __('Register') }}</a>
                            @endif
                            @else
                            <div class="relative inline-block text-left">
                                <div href="#"
                                    class="inline-flex justify-center items-center space-x-2 text-gray-700 hover:text-gray-900">
                                    <div class="py-1">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="block px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
