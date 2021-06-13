@extends('layouts.app')

@section('content')
    <div class="flex gap-10">
        <div class="h-full bg-white rounded shadow p-4 flex flex-col content-between ">
            <h2>{{ $movieSlot->movie->name }}</h2>
            <p>{{ __('cinema.rows', ['rows' => $movieSlot->cinemaHall->totalRows()]) }}</p>
            <p>{{ __('cinema.seats', ['seats' => $movieSlot->cinemaHall->totalSeats()]) }}</p>
            <h3><i class="fas fa-video"></i> {{ __('cinema.movie') }}</h3>
            <p>{{ __('cinema.duration', ['duration' => $movieSlot->movie->duration]) }}</p>
            <p>{{ __('cinema.minimum_age', ['age' => $movieSlot->movie->age]) }}</p>
            <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
            <p>{{ __('cinema.starting_at', ['date' => $movieSlot->starting_at]) }}</p>
            <h3><i class="fas fa-city"></i> {{ __('cinema.location') }}</h3>
            <p>{{ __('cinema.location.city', ['city' => $movieSlot->cinemaHall->cinema->city]) }}</p>
            <p>{{ $movieSlot->cinemaHall->cinema->house_number . ' ' . $movieSlot->cinemaHall->cinema->streetname}}</p>
            <p>{{ $movieSlot->cinemaHall->cinema->city . ', ' . $movieSlot->cinemaHall->cinema->country_code }}</p>
        </div>
        <div class="flex flex-col">
            <div class="h-full bg-white rounded shadow p-4 flex flex-col gap-1 select-none">
                @foreach($movieSlot->cinemaHall->cinemaHallRows as $cinemaHallRow)
                    <div class="flex flex-row gap-1">
                        <div>{{ $cinemaHallRow->row }}</div>
                        <div class="flex flex-row mx-auto gap-2">
                            @for($seat = 1; $seat <= $cinemaHallRow->number_of_seats; $seat++)
                                @if($cinemaHallRow->isEmptySeat($movieSlot, $seat))
                                    <div class="rounded shadow bg-gray-800 text-white text-sm text-center w-6">{{ $seat }}</div>
                                @else
                                    <div class="rounded shadow bg-red-600 text-white text-sm text-center w-6">{{ $seat }}</div>
                                @endif
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('movie.ticket.store', $movieSlot) }}" method="POST">
                @csrf
                @error('empty_seat')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
                <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                    <x-input type="number" id="row">{{ __('movie.row') }}</x-input>
                    <x-input type="number" id="column">{{ __('movie.column') }}</x-input>
                    <x-input type="number" id="seats">{{ __('movie.seats') }}</x-input>

                </div>
                <x-button type="submit">{{ __('general.submit') }}</x-button>
            </form>
        </div>
    </div>
@endsection
