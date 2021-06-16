@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ __('cinema.hall.row') }}</h1>
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form action="{{ route('cinemahall.row.store', $cinema_hall) }}" method="POST">
            @csrf
            @error('row')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="number" id="number_of_seats">{{ __('cinema.seat.number') }}</x-input>

            </div>
            <x-button type="submit">{{ __('general.submit') }}</x-button>
        </form>
    </div>
@endsection
