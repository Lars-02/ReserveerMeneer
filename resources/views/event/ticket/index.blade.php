@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ __('ticket.title') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($tickets as $ticket)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $ticket->event->name }}</h2>
                <h3><i class="fas fa-calendar-day"></i> {{ __('ticket.info') }}</h3>
                <p>{{ __('ticket.account', ['accountName' => $ticket->user->fullname]) }}</p>
                <p>{{ __('ticket.name', ['name' => $ticket->fullname]) }}</p>
                <p>{{ __('ticket.birthday', ['date' => $ticket->birthday]) }}</p>
                <h3><i class="fas fa-calendar-day"></i> {{ __('ticket.date') }}</h3>
                <p>{{ __('ticket.dates', ['startDate' => $ticket->start_at, 'endDate' => $ticket->end_at]) }}</p>
                <h3><i class="fas fa-city"></i> {{ __('ticket.location') }}</h3>
                <p>{{ __('ticket.location.city', ['city' => $ticket->event->city]) }}</p>
                <p>{{ $ticket->event->house_number . ' ' . $ticket->event->streetname}}</p>
                <p>{{ $ticket->event->city . ', ' . $ticket->event->country_code }}</p>
                <div class="flex justify-between mt-4">
                    @can('destroy', $ticket)
                        <a href="{{ route('event.ticket.destroy', $ticket) }}">
                            <x-button>{{ __('general.destroy') }}</x-button>
                        </a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
@endsection
