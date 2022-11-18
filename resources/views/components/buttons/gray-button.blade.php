<button
    {{ $attributes->merge(['class' => 'bg-gray-200 px-6 py-2 text-basis font-medium rounded-full drop-shadow-sm
        hover:bg-gray-300 active:bg-gray-200 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
