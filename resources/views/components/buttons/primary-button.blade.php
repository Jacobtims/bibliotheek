<button
    {{ $attributes->merge(['class' => 'bg-primary px-6 py-2 text-white font-medium rounded-full drop-shadow-xl
        hover:bg-primary-dark active:bg-primary disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
