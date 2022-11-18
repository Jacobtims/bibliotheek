<div x-data="{ open: false }">
    <!-- Hamburger icon -->
    <button class="md:hidden" @click="open = !open">
        <span class="material-symbols-outlined text-3xl">menu</span>
    </button>

    <!-- Mobile navbar -->
    <div
        class="flex flex-col md:hidden h-full w-full fixed top-0 left-0 overflow-x-hidden bg-primary z-[999] ease-in-out duration-300"
        :class="open ? 'translate-x-0' : 'translate-x-full'" x-cloak>
        <div class="py-3.5 px-4 flex justify-end">
            <button @click="open = !open">
                <span class="material-symbols-outlined text-white text-3xl">close</span>
            </button>
        </div>

        <!-- Navbar items -->
        <nav class="px-8 mt-10">
            <ul class="flex flex-col gap-8 items-center text-white font-medium">
                <x-navbar-item route="home">
                    Home
                </x-navbar-item>
                <x-navbar-item route="books.index">
                    Alle boeken
                </x-navbar-item>
                <x-navbar-item route="genres">
                    Genres
                </x-navbar-item>
                <x-navbar-item route="auteurs">
                    Auteurs
                </x-navbar-item>
            </ul>

            <hr class="my-5 text-white"/>

            <!-- Login / logout -->
            <div class="text-center">
                @guest()
                    <a href="{{ route('login') }}" class="py-2.5 px-6 text-white font-medium rounded-full hover:bg-white hover:text-primary transition ease-in-out duration-150">
                        Login
                    </a>
                @endguest
                @auth()
                    <div class="flex flex-col gap-6">
                        <a href="{{ route('dashboard') }}"
                           class="py-2.5 px-6 text-white font-medium rounded-full hover:bg-white hover:text-primary transition ease-in-out duration-150">
                            Dashboard
                        </a>
                        <!-- Logout button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                               class="py-2.5 px-6 text-white font-medium rounded-full hover:bg-white hover:text-primary transition ease-in-out duration-150">
                                Uitloggen
                            </a>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</div>
