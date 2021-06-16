@extends('layouts.app')

@section('content')
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form id="edit" action="{{ route('cinema.update', $cinema) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name" value="{{ $cinema->name }}">{{ __('general.name') }}</x-input>

                <x-input type="text" id="city" value="{{ $cinema->city }}">{{ __('general.city') }}</x-input>
                <x-input type="text" id="streetname" value="{{ $cinema->streetname }}">{{ __('general.street_name') }}</x-input>
                <x-input type="text" id="house_number" value="{{ $cinema->house_number }}">{{ __('general.house_number') }}</x-input>
                <x-input type="text" id="country_code" value="{{ $cinema->country_code }}">{{ __('general.country_code') }}</x-input>

            </div>
        </form>
        <div class="flex justify-between">
                <x-button form="edit" type="submit">{{ __('general.submit') }}</x-button>
                @can('delete', $cinema)
                    <form action="{{ route('cinema.destroy', $cinema) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="bg-red-600">{{ __('general.destroy') }}</x-button>
                    </form>
                @endcan
            </div>
    </div>
@endsection
