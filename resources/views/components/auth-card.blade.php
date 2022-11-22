@props(['wide' => false])

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <a href="{{ route('home') }}" class="block">
        <h1 class="text-3xl font-bold text-primary-dark">Bibliotheek</h1>
    </a>

    <div class="w-full {{ $wide ? 'sm:max-w-lg' : 'sm:max-w-md' }} mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
