<button
    {{ $attributes->merge(['class' => 'bg-green px-6 py-2 text-white font-medium rounded-full drop-shadow-xl
        hover:bg-green-dark active:bg-green disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
