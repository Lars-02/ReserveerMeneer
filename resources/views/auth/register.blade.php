@extends('layouts.app')

@section('content')
    <!-- Auth Card Container -->
    <div class="grid place-items-center">
        <!-- Auth Card -->
        <div class="w-11/12 p-12 sm:w-8/12 md:w-2/3 lg:w-1/2
            px-6 py-10 sm:px-10 sm:py-6
            bg-white rounded-lg shadow-md lg:shadow-lg my-10">

            <!-- Card Title -->
            <h2 class="text-center font-semibold text-2xl lg:text-3xl text-gray-800">Register Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid md:grid-cols-2 gap-x-4 mt-3">
                    <!-- Input -->
                    <x-input
                        type="email"
                        id="email"
                        autocomplete="email"
                        required autofocus
                    >Email
                    </x-input>
                    <x-input
                        id="firstname"
                        autocomplete="given-name"
                        required
                    >Firstname
                    </x-input>
                    <x-input
                        id="lastname"
                        autocomplete="family-name"
                        required
                    >Lastname
                    </x-input>
                    <x-input
                        type="date"
                        id="birthday">
                        required
                        {{ __('general.birthday') }}
                    </x-input>
                    <x-input type="text" id="city">{{ __('general.city') }}</x-input>
                    <x-input type="text" id="streetname">{{ __('general.street_name') }}</x-input>
                    <x-input type="text" id="house_number">{{ __('general.house_number') }}</x-input>
                    <x-input type="text" id="country_code">{{ __('general.country_code') }}</x-input>
                    <x-input
                        type="password"
                        id="password"
                        autocomplete="new-password"
                        required
                    >Password
                    </x-input>
                    <x-input
                        type="password"
                        id="password_confirmation"
                        autocomplete="new-password"
                        required
                    >Confirm Password
                    </x-input>
                </div>

                <!-- Auth Buttton -->
                <button type="submit"
                        class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-700 hover:shadow-none">
                    Create Account
                </button>

                <!-- Another Auth Routes -->
                <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">
                    <a href="{{ route('login') }}" class="flex-2 underline">
                        Go back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
