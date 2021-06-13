@extends('layouts.app')

@section('content')
    <div class="flex justify-between">
        <h1 class="my-6">{{ __('event.title') }}</h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="h-full flex-grow bg-white rounded shadow flex flex-col gap-4 content-between p-4">
            <h2>{{ __('general.filters') }}</h2>
            <form action="{{ route('home') }}" class="flex flex-col gap-4">
                <x-button type="submit" name="sort" value="name">{{ __('general.sort.name') }}</x-button>
                <x-button type="submit" name="sort" value="city">{{ __('general.sort.location') }}</x-button>
                <x-input type="text" id="search">{{ __('general.search') }}</x-input>
                <x-input type="date" id="from">{{ __('general.search.from') }}</x-input>
                <x-input type="date" id="until">{{ __('general.search.until') }}</x-input>
                <x-button type="submit">{{ __('general.search') }}</x-button>
            </form>
        </div>
        <div class="md:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-4">
            @foreach($items as $item)
                <div class="h-full bg-white rounded shadow p-4  flex flex-col content-between ">
                    @if(get_class($item) == \App\Models\Event::class)
                        <h2>{{ $item->name }}</h2>
                        <h3><i class="fas fa-calendar-day"></i> {{ __('event.date') }}</h3>
                        <p>{{ __('event.dates', ['startDate' => $item->start_date, 'endDate' => $item->end_date]) }}</p>
                        <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                        <p>{{ __('general.location.city', ['city' => $item->city]) }}</p>
                        <p>{{ $item->house_number . ' ' . $item->streetname}}</p>
                        <p>{{ $item->city . ', ' . $item->country_code }}</p>
                        <h3><i class="fas fa-city"></i> {{ __('event.tickets') }}</h3>
                        <p>{{ __('event.tickets.remaining', ['remaining' => $item->remainingTickets, 'total' => $item->total_tickets]) }}</p>
                        <p>{{ __('event.tickets.userMax', ['max' => $item->max_user_tickets]) }}</p>
                        <div class="flex justify-between mt-4">
                            @can('update', $item)
                                <a href="{{ route('event.edit', $item) }}">
                                    <x-button>{{ __('general.edit') }}</x-button>
                                </a>
                            @endcan
                            @can('create', \App\Models\EventTicket::class)
                                <a href="{{ route('event.buy', $item) }}">
                                    <x-button>{{ __('general.buy') }}</x-button>
                                </a>
                            @endcan
                        </div>
                    @else
                        <h2>{{ $item->name }}</h2>
                        <h3><i class="fas fa-city"></i> {{ __('general.location') }}</h3>
                        <p>{{ __('general.location.city', ['city' => $item->city]) }}</p>
                        <p>{{ $item->house_number . ' ' . $item->streetname}}</p>
                        <p>{{ $item->city . ', ' . $item->country_code }}</p>
                        <div class="flex justify-between mt-4">
                            @can('update', $item)
                                <a href="{{ route('cinema.edit', $item) }}">
                                    <x-button>{{ __('general.edit') }}</x-button>
                                </a>
                            @endcan
                            @can('view', $item)
                                <a href="{{ route('cinema.show', $item) }}">
                                    <x-button>{{ __('general.show') }}</x-button>
                                </a>
                            @endcan
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
