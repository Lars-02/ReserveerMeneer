@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="my-6">{{ __('restaurant.title') }}</h1>
        @can('create', \App\Models\Restaurant::class)
            <div class="flex items-center">
                <a href="{{ route('restaurant.create') }}">
                    <x-button>{{ __('general.create', ['item' => 'Restaurant']) }}</x-button>
                </a>
            </div>
        @endcan
    </div>
    @foreach($types as $type => $restaurants)
        <h2>{{ $type }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach($restaurants as $restaurant)
                <div class="h-full bg-white rounded shadow p-4 flex flex-col">
                    <div class="flex flex-col">
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
                    <div class="flex flex-row flex-grow items-end justify-between mt-4">
                        @can('update', $restaurant)
                            <a href="{{ route('restaurant.edit', $restaurant) }}">
                                <x-button>{{ __('general.edit') }}</x-button>
                            </a>
                        @endcan
                        @can('create', \App\Models\Reservation::class)
                            <a href="{{ route('restaurant.reserve', $restaurant) }}">
                                <x-button>{{ __('general.buy') }}</x-button>
                            </a>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
