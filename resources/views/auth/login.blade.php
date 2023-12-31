@extends('layouts.loginapp')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-10 text-3xl text-bold">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Email
                                Address') }}</label>

                            {{-- <div class="col-md-6"> --}}
                                <input id="email" type="email"
                                    class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                                    name="email" placeholder="oxsama@gmail.com" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback text-red-700" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{--
                            </div> --}}
                        </div>

                        <div class="mb-3">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                                __('Password') }}</label>

                            {{-- <div class="col-md-6"> --}}
                                <input id="password" type="password"
                                    class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{--
                            </div> --}}
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                {{-- <div class="form-check"> --}}
                                    <input
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                                        : '' }}>

                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    {{--
                                </div> --}}
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="flex items-center justify-between w-full">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-1/4 px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
