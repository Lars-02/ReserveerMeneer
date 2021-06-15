@extends('layouts.app')

@section('content')
    @empty(request()->route('user'))
        <h1 class="my-6">{{ __('reservation.my.title') }}</h1>
    @else
        <h1 class="my-6">{{ __('reservation.other.title', ['name' => request()->route('user')->fullname]) }}</h1>
    @endempty
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($reservations as $reservation)
                <div class="h-full bg-white rounded shadow p-4 flex flex-col">
                <div class="flex flex-col">
                    <h2>{{ $reservation->restaurant->name }}</h2>
                    <h3><i class="fas fa-calendar-day"></i> {{ __('reservation.info') }}</h3>
                    <p>{{ __('reservation.name', ['name' => $reservation->user->fullname]) }}</p>
                    <p>{{ __('reservation.guests', ['guests' => $reservation->number_of_guests]) }}</p>
                    @if($reservation->queued)
                        <p class="font-medium text-red-600">{{ __('reservation.queued') }}</p>
                    @endif
                    <h3><i class="fas fa-calendar-day"></i> {{ __('reservation.date') }}</h3>
                    <p>{{ __('reservation.time', ['time' => $reservation->time]) }}</p>
                    <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                    <p>{{ __('general.location.city', ['city' => $reservation->restaurant->city]) }}</p>
                    <p>{{ $reservation->restaurant->house_number . ' ' . $reservation->restaurant->streetname}}</p>
                    <p>{{ $reservation->restaurant->city . ', ' . $reservation->restaurant->country_code }}</p>
                </div>
                <div class="flex flex-row flex-grow items-end justify-between mt-4">
                    @can('delete', $reservation)
                        <form action="{{ route('restaurant.reservation.destroy', $reservation) }}" method="POST">
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
