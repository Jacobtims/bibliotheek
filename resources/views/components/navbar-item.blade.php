@props(['route'])

<li>
    <a class="py-2.5 px-6 rounded-full hover:bg-white hover:text-primary transition ease-in-out duration-150
    {{ (request()->routeIs($route)) ? 'bg-white text-primary' : '' }}"
       href="{{ route($route) }}">
        {{ $slot }}
    </a>
</li>
