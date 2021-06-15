@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="my-6">{{ __('cinema.title') }}</h1>
        @can('create', \App\Models\Cinema::class)
            <div class="flex items-center">
                <a href="{{ route('cinema.create') }}">
                    <x-button>{{ __('general.create', ['item' => 'Cinema']) }}</x-button>
                </a>
            </div>
        @endcan
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($cinemas as $cinema)
            <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                <h2>{{ $cinema->name }}</h2>
                <p>{{ __('cinema.halls.number', ['halls' => $cinema->cinemaHalls->count()]) }}</p>
                <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                <p>{{ __('general.location.city', ['city' => $cinema->city]) }}</p>
                <p>{{ $cinema->house_number . ' ' . $cinema->streetname}}</p>
                <p>{{ $cinema->city . ', ' . $cinema->country_code }}</p>
                <div class="flex justify-between mt-4">
                    @can('update', $cinema)
                        <a href="{{ route('cinema.edit', $cinema) }}">
                            <x-button>{{ __('general.edit') }}</x-button>
                        </a>
                    @endcan
                    @can('view', $cinema)
                        <a href="{{ route('cinema.show', $cinema) }}">
                            <x-button>{{ __('general.show') }}</x-button>
                        </a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-12 mx-10">
        {{ $cinemas->links() }}
    </div>
@endsection
