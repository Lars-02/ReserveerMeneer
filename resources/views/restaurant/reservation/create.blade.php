@extends('layouts.app')

@section('content')
    <div class="flex gap-10">
        <div class="h-full bg-white rounded shadow p-4 flex flex-col content-between">
            <h3>{{ $restaurant->name }}</h3>
            <h3><i class="fas fa-history"></i> {{ __('restaurant.reservation') }}</h3>
            <p>{{__('restaurant.reservation.max', ['max' => $restaurant->max_slot_reservations])}}</p>
            <h3><i class="fas fa-clock"></i> {{ __('restaurant.opening_hours') }}</h3>
            @foreach($restaurant->openingHours as $openingHour)
                <p>{{__('restaurant.opening_hours.time', ['day' => $openingHour->dowMap($openingHour->day), 'open' => $openingHour->opening_at, 'close' => $openingHour->closing_at])}}</p>
            @endforeach
            <h3><i class="fas fa-chair"></i> {{ __('restaurant.seats') }}</h3>
            <p>{{__('restaurant.seats.number', ['seats' => $restaurant->seats])}}</p>
            <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
            <p>{{ __('general.location.city', ['city' => $restaurant->city]) }}</p>
            <p>{{ $restaurant->house_number . ' ' . $restaurant->streetname}}</p>
            <p>{{ $restaurant->city . ', ' . $restaurant->country_code }}</p>
        </div>
        <form action="{{ route('restaurant.reservation.store', $restaurant) }}" method="POST">
            @csrf
            @error('queue')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 2xl:grid-cols-2 my-6">

                <x-input type="datetime-local" id="time">{{ __('reservation.time.slot') }}</x-input>
                <x-input type="number" id="number_of_guests">{{ __('reservation.guest.number') }}</x-input>
            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
