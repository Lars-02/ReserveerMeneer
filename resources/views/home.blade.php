@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="my-6">{{ __('general.home') }}</h1>
    </div>
    <div class="flex gap-4">
        <div class="h-full bg-white rounded shadow flex flex-col gap-4 content-between p-4">
            <h2>{{ __('general.filters') }}</h2>
            <form action="{{ route('home') }}" class="flex flex-col gap-4">
                <x-button type="submit" name="sort" value="name">{{ __('general.sort.name') }}</x-button>
                <x-button type="submit" name="sort" value="city">{{ __('general.sort.location') }}</x-button>
                <x-button type="submit" name="sort" value="start">{{ __('general.sort.date') }}</x-button>
                <x-input type="text" id="search" value="{{ $search }}">{{ __('general.search') }}</x-input>
                <x-input type="date" id="from" value="{{ $from }}">{{ __('general.search.from') }}</x-input>
                <x-input type="date" id="until" value="{{ $until }}">{{ __('general.search.until') }}</x-input>
                <x-button type="submit">{{ __('general.search') }}</x-button>
            </form>
        </div>
        <div class="flex-grow grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4">
            @foreach($items as $item)
                <div class="h-full bg-white rounded shadow p-4 flex flex-col">
                    @if(get_class($item) == \App\Models\Event::class)
                        <div class="flex flex-col">
                            <div
                                class="bg-gray-500 w-full text-xl text-white text-center font-bold rounded-lg">{{ __('event.title') }}</div>
                            <h2>{{ $item->name }}</h2>
                            <h3><i class="fas fa-calendar-day"></i> {{ __('event.date') }}</h3>
                            <p>{{ __('event.dates', ['startDate' => $item->start, 'endDate' => $item->end]) }}</p>
                            <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                            <p>{{ __('general.location.city', ['city' => $item->city]) }}</p>
                            <p>{{ $item->house_number . ' ' . $item->streetname}}</p>
                            <p>{{ $item->city . ', ' . $item->country_code }}</p>
                            <h3><i class="fas fa-city"></i> {{ __('event.tickets') }}</h3>
                            <p>{{ __('event.tickets.remaining', ['remaining' => $item->remainingTickets, 'total' => $item->total_tickets]) }}</p>
                            <p>{{ __('event.tickets.userMax', ['max' => $item->max_user_tickets]) }}</p>
                        </div>
                        <div class="flex flex-row flex-grow items-end justify-between mt-4">
                            @can('update', $item)
                                <a href="{{ route('event.edit', $item) }}">
                                    <x-button>{{ __('general.edit') }}</x-button>
                                </a>
                            @endcan
                            @can('create', \App\Models\EventTicket::class)
                                <a href="{{ route('event.buy', $item) }}">
                                    <x-button>{{ __('general.buy') }}</x-button>
                                </a>
                            @endcan
                        </div>
                    @else
                        <div class="flex flex-col">
                            <div
                                class="bg-gray-500 w-full text-xl text-white text-center font-bold rounded-lg">{{ __('cinema.title') }}</div>
                            <h2>{{ $item->movie->name }}</h2>
                            <h3><i class="fas fa-city"></i> {{ $item->cinemaHall->cinema->name }}</h3>
                            <p>{{ __('general.location.city', ['city' => $item->cinemaHall->cinema->city]) }}</p>
                            <p>{{ $item->cinemaHall->cinema->house_number . ' ' . $item->cinemaHall->cinema->streetname}}</p>
                            <p>{{ $item->cinemaHall->cinema->city . ', ' . $item->cinemaHall->cinema->country_code }}</p>
                            <h3><i class="fas fa-calendar-day"></i> {{ __('cinema.time') }}</h3>
                            <p>{{ __('cinema.starting_at', ['date' => $item->start]) }}</p>
                            <h3><i class="fas fa-video"></i> {{ __('cinema.movie') }}</h3>
                            <p>{{ __('cinema.duration', ['duration' => $item->movie->duration]) }}</p>
                            <p>{{ __('cinema.minimum_age', ['age' => $item->movie->minimum_age]) }}</p>
                        </div>
                        <div class="flex flex-row flex-grow items-end justify-between mt-4">

                            @can('create', \App\Models\MovieTicket::class)
                                <div class="flex items-center mt-4">
                                    <a href="{{ route('movie.buy', $item) }}">
                                        <x-button>{{ __('general.buy') }}</x-button>
                                    </a>
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-12 mx-10">
        {{ $items->links() }}
    </div>
@endsection
