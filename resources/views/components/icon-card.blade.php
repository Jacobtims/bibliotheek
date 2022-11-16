@props(['icon', 'title', 'url'])

<x-card class="px-5 py-6">
    <a href="{{ $url }}">
        <div class="w-28 h-28 flex items-center justify-center mx-auto rounded-full bg-primary-light">
            <span class="material-symbols-outlined" style="font-size: 70px;">{{ $icon }}</span>
        </div>
        <h1 class="text-center font-medium text-2xl mt-4">{{ $title }}</h1>
    </a>
</x-card>
