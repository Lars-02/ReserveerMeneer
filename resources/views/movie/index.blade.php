@extends('layouts.app')

@section('content')
<h1>{{ __('cinema.movies') }}</h1>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    @foreach($movies as $movie)
        <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
            <h2>{{ $movie->name }}</h2>
            <p>{{ __('cinema.duration', ['duration' => $movie->duration]) }}</p>
            <p>{{ __('cinema.minimum_age', ['age' => $movie->minimum_age]) }}</p>
            <p>{{ __('cinema.halls.number.movie', ['halls' => $movie->movieSlots->count()]) }}</p>
            @can('view', $movie)
                <div class="flex items-center mt-4">
                    <a href="{{ route('movie.show', $movie) }}">
                        <x-button>{{ __('general.show') }}</x-button>
                    </a>
                </div>
            @endcan
        </div>
    @endforeach
</div>
<div class="p-12 mx-10">
    {{ $movies->links() }}
</div>
@endsection
