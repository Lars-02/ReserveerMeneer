@extends('layouts.app')

@section('content')
    <div class="flex gap-10">
        <div class="h-full bg-white rounded shadow p-4 flex flex-col content-between ">
            <h2>{{ $movieTicket->movieSlot->movie->name }}</h2>
            <p>{{ __('cinema.duration', ['duration' => $movieTicket->movieSlot->movie->duration]) }}</p>
            <p>{{ __('cinema.minimum_age', ['age' => $movieTicket->movieSlot->movie->minimum_age]) }}</p>
            <h3><i class="fas fa-chair"></i> {{ __('cinema.seat') }}</h3>
            <p>{{__('cinema.my.hall', ['hall' => $movieTicket->movieSlot->cinemaHall->id])}}</p>
            <p>{{__('ticket.seat', ['row' => $movieTicket->row, 'seat' => $movieTicket->column])}}</p>
            <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
            <p>{{ __('general.location.city', ['city' => $movieTicket->movieSlot->cinemaHall->cinema->city]) }}</p>
            <p>{{ $movieTicket->movieSlot->cinemaHall->cinema->house_number . ' ' . $movieTicket->movieSlot->cinemaHall->cinema->streetname}}</p>
            <p>{{ $movieTicket->movieSlot->cinemaHall->cinema->city . ', ' . $movieTicket->movieSlot->cinemaHall->cinema->country_code }}</p>
            <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
            <p>{{ __('cinema.starting_at', ['date' => $movieTicket->movieSlot->start]) }}</p>
        </div>
        <div class="flex flex-col">
            <div class="h-full bg-white rounded shadow p-4 flex flex-col gap-1 select-none">
                @foreach($movieTicket->movieSlot->cinemaHall->cinemaHallRows as $cinemaHallRow)
                    <div class="flex flex-row gap-1">
                        <div>{{ $cinemaHallRow->row }}</div>
                        <div class="flex flex-row mx-auto gap-2">
                            @for($seat = 1; $seat <= $cinemaHallRow->number_of_seats; $seat++)
                                @if($cinemaHallRow->isEmptySeat($movieTicket->movieSlot, $seat))
                                    <div
                                        class="rounded shadow bg-gray-800 text-white text-sm text-center w-6">{{ $seat }}</div>
                                @else
                                    <div
                                        class="rounded shadow bg-red-600 text-white text-sm text-center w-6">{{ $seat }}</div>
                                @endif
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
