@extends('layouts.app')

@section('content')
    @empty(request()->route('user'))
        <h1 class="my-6">{{ __('ticket.movie.title') }}</h1>
    @else
        <h1 class="my-6">{{ __('ticket.title', ['name' => request()->route('user')->fullname]) }}</h1>
    @endempty
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($tickets as $movie_ticket)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $movie_ticket->movieSlot->movie->name }}</h2>
                <p>{{ __('cinema.duration', ['duration' => $movie_ticket->movieSlot->movie->duration]) }}</p>
                <p>{{ __('cinema.minimum_age', ['age' => $movie_ticket->movieSlot->movie->minimum_age]) }}</p>
                <h3><i class="fas fa-chair"></i> {{ __('cinema.seat') }}</h3>
                <p>{{__('cinema.my.hall', ['hall' => $movie_ticket->movieSlot->cinemaHall->id])}}</p>
                <p>{{__('ticket.seat', ['row' => $movie_ticket->row, 'seat' => $movie_ticket->column])}}</p>
                <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                <p>{{ __('general.location.city', ['city' => $movie_ticket->movieSlot->cinemaHall->cinema->city]) }}</p>
                <p>{{ $movie_ticket->movieSlot->cinemaHall->cinema->house_number . ' ' . $movie_ticket->movieSlot->cinemaHall->cinema->streetname}}</p>
                <p>{{ $movie_ticket->movieSlot->cinemaHall->cinema->city . ', ' . $movie_ticket->movieSlot->cinemaHall->cinema->country_code }}</p>
                <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
                <p>{{ __('cinema.starting_at', ['date' => $movie_ticket->movieSlot->start]) }}</p>
                <div class="flex justify-between mt-4">
                    @can('delete', $movie_ticket)
                        <form action="{{ route('movie.ticket.destroy', $movie_ticket) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" class="bg-red-600">{{ __('general.destroy') }}</x-button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
@endsection
