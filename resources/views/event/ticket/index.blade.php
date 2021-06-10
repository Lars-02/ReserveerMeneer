@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ __('ticket.title') }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($tickets as $event_ticket)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $event_ticket->event->name }}</h2>
                <h3><i class="fas fa-calendar-day"></i> {{ __('ticket.info') }}</h3>
                <p>{{ __('ticket.account', ['name' => $event_ticket->user->fullname]) }}</p>
                <p>{{ __('ticket.name', ['name' => $event_ticket->fullname]) }}</p>
                <p>{{ __('ticket.birthday.date', ['date' => date('d-m-Y', strtotime($event_ticket->birthday))]) }}</p>
                <h3><i class="fas fa-calendar-day"></i> {{ __('ticket.date') }}</h3>
                <p>{{ __('ticket.dates', ['startDate' => date('d-m-Y', strtotime($event_ticket->start_at)), 'endDate' => date('d-m-Y', strtotime($event_ticket->end_at))]) }}</p>
                <h3><i class="fas fa-city"></i> {{ __('ticket.location') }}</h3>
                <p>{{ __('ticket.location.city', ['city' => $event_ticket->event->city]) }}</p>
                <p>{{ $event_ticket->event->house_number . ' ' . $event_ticket->event->streetname}}</p>
                <p>{{ $event_ticket->event->city . ', ' . $event_ticket->event->country_code }}</p>
                <div class="flex justify-between mt-4">
                    @can('delete', $event_ticket)
                    <form action="{{ route('event.ticket.destroy', $event_ticket) }}" method="POST">
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
