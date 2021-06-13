@extends('layouts.app')

@section('content')
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name">{{ __('event.name') }}</x-input>

                <x-input type="date" id="start_date">{{ __('event.start_date') }}</x-input>
                <x-input type="date" id="end_date">{{ __('event.end_date') }}</x-input>

                <x-input type="number" id="total_tickets">{{ __('event.total_tickets') }}</x-input>
                <x-input type="number" id="max_user_tickets">{{ __('event.max_user_tickets') }}</x-input>

                <x-input type="text" id="city">{{ __('general.city') }}</x-input>
                <x-input type="text" id="streetname">{{ __('general.street_name') }}</x-input>
                <x-input type="text" id="house_number">{{ __('general.house_number') }}</x-input>
                <x-input type="text" id="country_code">{{ __('general.country_code') }}</x-input>

            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
