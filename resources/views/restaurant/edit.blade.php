@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ __('restaurant.title') }}</h1>
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form id="edit" action="{{ route('restaurant.update', $restaurant) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name" value="{{ $restaurant->name }}">{{ __('general.name') }}</x-input>
                <x-input type="number" id="seats"
                         value="{{ $restaurant->seats }}">{{ __('restaurant.seats') }}</x-input>
                <x-input type="number" id="max_slot_reservations"
                         value="{{ $restaurant->max_slot_reservations }}">{{ __('restaurant.seats.max.title') }}</x-input>

                <x-input type="text" id="city" value="{{ $restaurant->city }}">{{ __('general.city') }}</x-input>
                <x-input type="text" id="streetname"
                         value="{{ $restaurant->streetname }}">{{ __('general.street_name') }}</x-input>
                <x-input type="text" id="house_number"
                         value="{{ $restaurant->house_number }}">{{ __('general.house_number') }}</x-input>
                <x-input type="text" id="country_code"
                         value="{{ $restaurant->country_code }}">{{ __('general.country_code') }}</x-input>

                <x-select id="restaurant_type_id" :options="$types">{{ __('restaurant.type') }}</x-select>
            </div>
        </form>
        <div class="flex justify-between">
            <x-button form="edit" type="submit">{{ __('general.submit') }}</x-button>
            @can('delete', $restaurant)
                <form action="{{ route('restaurant.destroy', $restaurant) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="bg-red-600">{{ __('general.destroy') }}</x-button>
                </form>
            @endcan
        </div>
    </div>
@endsection
