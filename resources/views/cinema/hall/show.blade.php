@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1>{{ __('cinema.hall.index', ['index' => $cinema_hall->id]) }}</h1>
        <div class="flex items-center gap-4">
            @can('delete', $cinema_hall)
                <form action="{{ route('cinemahall.destroy', $cinema_hall) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="bg-red-600">{{ __('general.destroy') }}</x-button>
                </form>
            @endcan
        </div>
    </div>
    <div class="flex gap-10">
        <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
            <h2>{{ $cinema_hall->cinema->name }}</h2>
            <p>{{ __('cinema.rows', ['rows' => $cinema_hall->totalRows()]) }}</p>
            <p>{{ __('cinema.seats', ['seats' => $cinema_hall->totalSeats()]) }}</p>
            <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
            <p>{{ __('general.location.city', ['city' => $cinema_hall->cinema->city]) }}</p>
            <p>{{ $cinema_hall->cinema->house_number . ' ' . $cinema_hall->cinema->streetname}}</p>
            <p>{{ $cinema_hall->cinema->city . ', ' . $cinema_hall->cinema->country_code }}</p>
            <h3><i class="fas fa-video"></i> {{ __('cinema.movies') }}</h3>
            <p>{{ __('cinema.movies.number', ['movies' => $cinema_hall->movieSlots->count()]) }}</p>
        </div>
        <div class="flex-grow h-full bg-white rounded shadow p-4 flex flex-col gap-1 select-none">
            @foreach($cinema_hall->cinemaHallRows as $cinemaHallRow)
                <div class="flex flex-row gap-1">
                    <div>{{ $cinemaHallRow->row }}</div>
                    <div class="flex flex-row mx-auto gap-2">
                        @for($seat = 1; $seat <= $cinemaHallRow->number_of_seats; $seat++)
                            <div class="rounded shadow bg-gray-800 text-white text-sm text-center w-6">{{ $seat }}</div>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h1>{{ __('cinema.movies') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($cinema_hall->movieSlots as $movieSlot)
            <div class="h-full bg-white rounded shadow p-4 flex flex-col">
                <div class="flex flex-col">
                    <h2>{{ $movieSlot->movie->name }}</h2>
                    <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
                    <p>{{ __('cinema.starting_at', ['date' => $movieSlot->starting_at]) }}</p>
                    <h3><i class="fas fa-video"></i> {{ __('cinema.movie') }}</h3>
                    <p>{{ __('cinema.duration', ['duration' => $movieSlot->movie->duration]) }}</p>
                    <p>{{ __('cinema.minimum_age', ['age' => $movieSlot->movie->minimum_age]) }}</p>
                </div>
                @can('create', \App\Models\MovieTicket::class)
                        <div class="flex flex-row flex-grow items-end justify-between mt-4">
                        <a href="{{ route('movie.buy', $movieSlot) }}">
                            <x-button>{{ __('general.buy') }}</x-button>
                        </a>
                    </div>
                @endcan
            </div>

        @endforeach
    </div>
@endsection
