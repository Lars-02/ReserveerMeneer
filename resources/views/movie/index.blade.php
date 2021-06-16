@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1>{{ __('cinema.movies') }}</h1>
        @can('create', \App\Models\Movie::class)
            <div class="flex items-center">
                <a href="{{ route('movie.create') }}">
                    <x-button>{{ __('general.create', ['item' => __('cinema.movies')]) }}</x-button>
                </a>
            </div>
        @endcan
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($movies as $movie)
            <div class="h-full bg-white rounded shadow p-4 flex flex-col">
                <div class="flex flex-col">
                    <h2>{{ $movie->name }}</h2>
                    <p>{{ __('cinema.duration', ['duration' => $movie->duration]) }}</p>
                    <p>{{ __('cinema.minimum_age', ['age' => $movie->minimum_age]) }}</p>
                    <p>{{ __('cinema.halls.number.movie', ['halls' => $movie->movieSlots->count()]) }}</p>
                </div>
                <div class="flex flex-row flex-grow items-end justify-between mt-4">
                    @can('view', $movie)
                        <div class="flex items-center mt-4">
                            <a href="{{ route('movie.show', $movie) }}">
                                <x-button>{{ __('general.show') }}</x-button>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-12 mx-10">
        {{ $movies->links() }}
    </div>
@endsection
