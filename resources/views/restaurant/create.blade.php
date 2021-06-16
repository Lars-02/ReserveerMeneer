@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ __('restaurant.title') }}</h1>
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form action="{{ route('restaurant.store') }}" method="POST">
            @csrf
            @error('row')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name">{{ __('general.name') }}</x-input>
                <x-input type="number" id="seats">{{ __('restaurant.seats') }}</x-input>
                <x-input type="number" id="max_slot_reservations" value="10">{{ __('restaurant.seats.max.title') }}</x-input>

                <x-input type="text" id="city">{{ __('general.city') }}</x-input>
                <x-input type="text" id="streetname">{{ __('general.street_name') }}</x-input>
                <x-input type="text" id="house_number">{{ __('general.house_number') }}</x-input>
                <x-input type="text" id="country_code">{{ __('general.country_code') }}</x-input>

                <x-select id="restaurant_type_id" :options="$types">{{ __('restaurant.type') }}</x-select>
            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
