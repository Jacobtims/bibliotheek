<div class="bg-white">
    <div class="max-w-7xl mx-auto py-3.5 px-4 flex gap-4 justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}">
            <h1 class="text-2xl font-bold text-primary-dark">Bibliotheek</h1>
        </a>

        <!-- Search field -->
        <div class="hidden md:block relative w-96">
            <input type="text" class="block w-full py-2.5 px-5 pr-14 border-2 border-primary rounded-2xl placeholder-gray focus:border-primary focus:ring-0" placeholder="Zoek voor een boek"/>
            <button type="submit" class="absolute top-0 right-0 h-full px-3 inline-flex items-center text-white bg-primary rounded-r-2xl hover:bg-primary-dark"><span class="material-symbols-outlined">search</span></button>
        </div>

        <div class="hidden md:block">
            @guest()
                <!-- Login button -->
                <a href="{{ route('login') }}">
                    <x-buttons.primary-button>Login</x-buttons.primary-button>
                </a>
            @endguest
            @auth()
                <!-- Username with dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center font-medium transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1 inline-flex">
                                <span class="material-symbols-outlined text-md mt-0.5">expand_more</span>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                             this.closest('form').submit();">
                                Uitloggen
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>

        <!-- Responsive hamburger menu toggle -->
        @include('layouts.mobile-navbar')
    </div>
</div>

<!-- Navbar -->
<div class="hidden md:block bg-primary">
    <nav class="max-w-7xl mx-auto py-6 px-4">
        <ul class="flex gap-6 items-center text-white font-medium">
            <x-navbar-item route="home">
                Home
            </x-navbar-item>
            <x-navbar-item route="alle-boeken">
                Alle boeken
            </x-navbar-item>
            <x-navbar-item route="genres">
                Genres
            </x-navbar-item>
            <x-navbar-item route="auteurs">
                Auteurs
            </x-navbar-item>
        </ul>
    </nav>
</div>
