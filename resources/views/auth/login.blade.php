@extends('layouts.app')

@section('content')
    <!-- Auth Card Container -->
    <div class="grid place-items-center">
        <!-- Auth Card -->
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-4/12 2xl:w-3/12
            px-6 py-10 sm:px-10 sm:py-6
            bg-white rounded-lg shadow-md lg:shadow-lg my-10">

            <!-- Card Title -->
            <h2 class="text-center font-semibold text-2xl lg:text-3xl text-gray-800">
                Login
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-input
                    type="email"
                    id="email"
                    autocomplete="email"
                    required autofocus
                >E-mail</x-input>
                <x-input
                    type="password"
                    id="password"
                    autocomplete="password"
                    required
                >Password</x-input>

                <!-- Auth Buttton -->
                <button type="submit"
                        class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-700 hover:shadow-none">
                    Login
                </button>

                <!-- Another Auth Routes -->
                <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">
                    <a href="{{ route('register') }}" class="flex-2 underline">
                        Create an Account
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
