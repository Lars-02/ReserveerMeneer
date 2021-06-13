@extends('layouts.app')

@section('content')
    <div class="flex gap-10">
        <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
            <h2>{{ $event->name }}</h2>
            <h3><i class="fas fa-calendar-day"></i> {{ __('event.date') }}</h3>
            <p>{{ __('event.dates', ['startDate' => date('d-m-Y', strtotime($event->start_date)), 'endDate' => date('d-m-Y', strtotime($event->end_date))]) }}</p>
            <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
            <p>{{ __('general.location.city', ['city' => $event->city]) }}</p>
            <p>{{ $event->house_number . ' ' . $event->streetname}}</p>
            <p>{{ $event->city . ', ' . $event->country_code }}</p>
            <h3><i class="fas fa-city"></i> {{ __('event.tickets') }}</h3>
            <p>{{ __('event.tickets.remaining', ['remaining' => $event->remainingTickets, 'total' => $event->total_tickets]) }}</p>
            <p>{{ __('event.tickets.userMax', ['max' => $event->max_user_tickets]) }}</p>
        </div>
        <form action="{{ route('event.ticket.store', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('total_tickets')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="firstname">{{ __('general.firstname') }}</x-input>
                <x-input type="text" id="lastname">{{ __('general.lastname') }}</x-input>
                <x-input type="date" id="birthday">{{ __('general.birthday') }}</x-input>

                <div class="flex self-center">
                    <input class="mt-4 p-2 bg-purple-500 rounded text-sm text-white font-medium" name="photo_path"
                           type="file">
                    @error('photo_path')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <x-input type="date" id="start_at">{{ __('ticket.start_at') }}</x-input>
                <x-input type="date" id="end_at">{{ __('ticket.end_at') }}</x-input>
            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
