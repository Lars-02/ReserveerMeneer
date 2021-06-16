@extends('layouts.app')

@section('content')
    <h1 class="my-6">{{ $movie->name }}</h1>
    <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
        <form id="edit" action="{{ route('movie.update', $movie) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="select-none grid gap-1 sm:gap-2 md:gap-4 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 my-6">

                <x-input type="text" id="name" value="{{ $movie->name }}">{{ __('general.name') }}</x-input>
                <x-input type="time" id="duration"
                         value="{{ $movie->duration }}">{{ __('cinema.duration.title') }}</x-input>
                <x-input type="number" id="minimum_age"
                         value="{{ $movie->minimum_age }}">{{ __('cinema.age') }}</x-input>

            </div>
        </form>
        <div class="flex justify-between">
            <x-button form="edit" type="submit">{{ __('general.submit') }}</x-button>

            @can('delete', $movie)
                <form action="{{ route('movie.destroy', $movie) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="bg-red-600">{{ __('general.destroy') }}</x-button>
                </form>
            @endcan
        </div>
    </div>
@endsection
