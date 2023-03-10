@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'rounded-xl shadow-sm border-border focus:border-primary focus:ring focus:ring-cyan-300 focus:ring-opacity-50 disabled:bg-gray-100']) !!}
>
