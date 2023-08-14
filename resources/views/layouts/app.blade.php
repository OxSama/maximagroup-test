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
    <div>
        <nav class="bg-white shadow-sm">
            <div class="container px-4 py-2 mx-auto">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}" class="text-lg font-semibold">{{ config('app.name', 'Laravel') }}</a>

                    <div class="md:hidden">
                        <button class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                        </button>
                    </div>

                    <div class="items-center hidden md:flex">
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
                            <div class="relative inline-block mr-4 text-left">
                                <button id="notificationButton" class="text-gray-500 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                    </svg>
                                </button>
                                <div
                                    class="absolute right-0 hidden w-64 mt-2 origin-top-right bg-white rounded-md shadow-lg dropdown ring-1 ring-black ring-opacity-5">
                                    <div class="py-1">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Notification
                                            1</a>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Notification
                                            2</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="inline-flex items-center justify-center space-x-2 text-gray-700 hover:text-gray-900">
                                <div class="py-1">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </div>


    {{-- <main class="py-4" id="app">
        @yield('content')
    </main> --}}
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let notificationButton = document.getElementById('notificationButton');
        let dropdown = document.querySelector('.dropdown');

        // Toggle dropdown on button click
        notificationButton.addEventListener('click', function () {
            dropdown.classList.toggle('hidden');
        });

        // Close dropdown if clicked anywhere outside
        document.addEventListener('click', function (event) {
            if (!notificationButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
</script>

</html>
