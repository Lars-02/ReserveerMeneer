@extends('layouts.app')

@section('content')
    <form action="{{ route('event.ticket.store', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 my-6">

            <x-input type="text" id="firstname">{{ __('ticket.firstname') }}</x-input>
            <x-input type="text" id="lastname">{{ __('ticket.lastname') }}</x-input>
            <x-input type="date" id="birthday">{{ __('ticket.birthday') }}</x-input>

            <div class="flex self-center">
                <input class="mt-4 p-2 bg-purple-500 rounded text-sm text-white font-medium" name="photo_path" type="file">
                @error('photo_path')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-input type="date" id="start_at">{{ __('ticket.start_at') }}</x-input>
            <x-input type="date" id="end_at">{{ __('ticket.end_at') }}</x-input>
        </div>
        <x-button type="submit">{{ __('general.submit') }}</x-button>
    </form>
@endsection
