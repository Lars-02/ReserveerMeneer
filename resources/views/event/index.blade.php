@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="my-6">{{ __('event.title') }}</h1>
        @can('create', \App\Models\Event::class)
            <div class="flex items-center">
                <a href="{{ route('event.create') }}">
                    <x-button>{{ __('general.create', ['item' => 'Event']) }}</x-button>
                </a>
            </div>
        @endcan
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($events as $event)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $event->name }}</h2>
                <h3><i class="fas fa-calendar-day"></i> {{ __('event.date') }}</h3>
                <p>{{ __('event.dates', ['startDate' => $event->start_date, 'endDate' => $event->end_date]) }}</p>
                <h3><i class="fas fa-city"></i> {{ __('event.location') }}</h3>
                <p>{{ __('event.location.city', ['city' => $event->city]) }}</p>
                <p>{{ $event->house_number . ' ' . $event->streetname}}</p>
                <p>{{ $event->city . ', ' . $event->country_code }}</p>
                <h3><i class="fas fa-city"></i> {{ __('event.tickets') }}</h3>
                <p>{{ __('event.tickets.remaining', ['remaining' => $event->remainingTickets, 'total' => $event->total_tickets]) }}</p>
                <p>{{ __('event.tickets.userMax', ['max' => $event->max_user_tickets]) }}</p>
                <div class="flex justify-between mt-4">
                    @can('update', $event)
                        <a href="{{ route('event.edit', $event) }}">
                            <x-button>{{ __('general.edit') }}</x-button>
                        </a>
                    @endcan
                    @can('create', \App\Models\EventTicket::class)
                        <a href="{{ route('event.buy', $event) }}">
                            <x-button>{{ __('general.buy') }}</x-button>
                        </a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
@endsection
