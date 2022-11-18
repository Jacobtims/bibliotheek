@props(['disabled' => false])

<input
    type="checkbox"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'text-primary-dark rounded-sm shadow-sm border-border focus:border-primary focus:ring focus:ring-cyan-300 focus:ring-opacity-50 disabled:bg-gray-100']) !!}
>
