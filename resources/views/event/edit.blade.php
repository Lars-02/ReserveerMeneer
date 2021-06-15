@extends('layouts.app')

@section('content')
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form action="{{ route('event.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name" value="{{ $event->name }}">{{ __('event.name') }}</x-input>

                <x-input type="date" id="start" value="{{ $event->start }}">{{ __('event.start_date') }}</x-input>
                <x-input type="date" id="end" value="{{ $event->end }}">{{ __('event.end_date') }}</x-input>

                <x-input type="number" id="total_tickets" value="{{ $event->total_tickets }}">{{ __('event.total_tickets') }}</x-input>
                <x-input type="number" id="max_user_tickets" value="{{ $event->max_user_tickets }}">{{ __('event.max_user_tickets') }}</x-input>

                <x-input type="text" id="city" value="{{ $event->city }}">{{ __('general.city') }}</x-input>
                <x-input type="text" id="streetname" value="{{ $event->streetname }}">{{ __('general.street_name') }}</x-input>
                <x-input type="text" id="house_number" value="{{ $event->house_number }}">{{ __('general.house_number') }}</x-input>
                <x-input type="text" id="country_code" value="{{ $event->country_code }}">{{ __('general.country_code') }}</x-input>

            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
