<nav class="flex shadow p-2 text-gray-800 text-lg font-medium bg-white select-none">
    <div class="flex-none self-center p-2 mx-4">
        <a href="{{ url('/') }}">
            <div
                class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-purple-600 hover:from-yellow-500 hover:to-purple-900">
                Reserveermeneer
            </div>
        </a>
    </div>
    @auth()
        <div class="flex-none self-center p-2 hover:text-purple-500">
            <a href="{{ route('home') }}">Home</a>
        </div>
    @endauth
    <div class="flex-none self-center p-2 hover:text-purple-500">
        <a href="{{ route('event.index') }}">Events</a>
    </div>

<!-- Spreader -->
    <div class="flex-auto"></div>


    <div class="flex-none self-center p-2 hover:text-purple-500">
        <a href="{{ route('locale', 'en') }}">EN</a>
    </div>
    <div class="flex-none self-center p-2 hover:text-purple-500">
        <a href="{{ route('locale', 'nl') }}">NL</a>
    </div>

    @guest()
        <div class="flex-none self-center p-2 hover:text-blue-700">
            <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="flex-none self-center p-2 hover:text-blue-700">
            <a href="{{ route('register') }}">Register</a>
        </div>

    @else
        <div class="flex-none self-center p-2 hover:text-blue-700">
            <x-dropdown alignment="right">
                <x-slot name="trigger">
                    <a href="#"
                       class="focus:outline-none flex-none font-medium self-center hover:text-purple-500">Hey, {{ Auth::user()->fullname }}</a>
                </x-slot>
                <x-dropdown-link href="{{ route('event.ticket.index') }}">My Events</x-dropdown-link>
                <x-dropdown-link
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    Logout
                </x-dropdown-link>
            </x-dropdown>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endguest
</nav>
