<button
    {{ $attributes->merge(['class' => 'bg-red px-6 py-2 text-white font-medium rounded-full drop-shadow-xl
        hover:bg-red-dark active:bg-red disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
