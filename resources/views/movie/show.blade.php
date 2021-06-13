@extends('layouts.app')

@section('content')
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <h1>{{ $movie->name }}</h1>
        <p>{{ __('cinema.duration', ['duration' => $movie->duration]) }}</p>
        <p>{{ __('cinema.minimum_age', ['age' => $movie->minimum_age]) }}</p>
    </div>
    <h1>{{ __('cinema.halls') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($movie->movieSlots as $movieSlot)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $movieSlot->cinemaHall->cinema->name }}</h2>
                <p>{{ __('cinema.rows', ['rows' => $movieSlot->cinemaHall->totalRows()]) }}</p>
                <p>{{ __('cinema.seats', ['seats' => $movieSlot->cinemaHall->totalSeats()]) }}</p>
                <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                <p>{{ __('general.location.city', ['city' => $movieSlot->cinemaHall->cinema->city]) }}</p>
                <p>{{ $movieSlot->cinemaHall->cinema->house_number . ' ' . $movieSlot->cinemaHall->cinema->streetname}}</p>
                <p>{{ $movieSlot->cinemaHall->cinema->city . ', ' . $movieSlot->cinemaHall->cinema->country_code }}</p>
                <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
                <p>{{ __('cinema.starting_at', ['date' => $movieSlot->starting_at]) }}</p>
                @can('create', \App\Models\MovieTicket::class)
                    <div class="flex items-center mt-4">
                        <a href="{{ route('movie.buy', $movieSlot) }}">
                            <x-button>{{ __('general.buy') }}</x-button>
                        </a>
                    </div>
                @endcan
            </div>
        @endforeach
    </div>
@endsection
