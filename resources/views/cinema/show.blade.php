@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1>{{ __('cinema.cinema') }}</h1>
        @can('update', $cinema)
            <div class="flex items-center">
                <a href="{{ route('cinema.edit', $cinema) }}">
                    <x-button>{{ __('general.edit') }}</x-button>
                </a>
            </div>
        @endcan
    </div>
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <h2>{{ $cinema->name }}</h2>
        <h3><i class="fas fa-city"></i> {{ __('cinema.location') }}</h3>
        <p>{{ __('cinema.location.city', ['city' => $cinema->city]) }}</p>
        <p>{{ $cinema->house_number . ' ' . $cinema->streetname}}</p>
        <p>{{ $cinema->city . ', ' . $cinema->country_code }}</p>
    </div>
    <h1>{{ __('cinema.halls') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($cinema->cinemaHalls as $index => $cinema_hall)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ __('cinema.hall', ['index' => $index + 1]) }}</h2>
                <p>{{ __('cinema.rows', ['rows' => $cinema_hall->totalRows()]) }}</p>
                <p>{{ __('cinema.seats', ['seats' => $cinema_hall->totalSeats()]) }}</p>
                <h3><i class="fas fa-video"></i> {{ __('cinema.movies') }}</h3>
                <p>{{ __('cinema.movies.number', ['movies' => $cinema_hall->movieSlots->count()]) }}</p>
                @can('view', $cinema_hall)
                    <div class="flex items-center mt-4">
                        <a href="{{ route('cinemahall.show', $cinema_hall) }}">
                            <x-button>{{ __('general.show') }}</x-button>
                        </a>
                    </div>
                @endcan
            </div>
        @endforeach
    </div>
    <h1>{{ __('cinema.movies.cinema') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-4">
        @foreach($cinema->movieSlots as $movieSlot)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $movieSlot->movie->name }}</h2>
                <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
                <p>{{ __('cinema.starting_at', ['date' => $movieSlot->starting_at]) }}</p>
                <h3><i class="fas fa-video"></i> {{ __('cinema.movie') }}</h3>
                <p>{{ __('cinema.duration', ['duration' => $movieSlot->movie->duration]) }}</p>
                <p>{{ __('cinema.minimum_age', ['age' => $movieSlot->movie->minimum_age]) }}</p>
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
