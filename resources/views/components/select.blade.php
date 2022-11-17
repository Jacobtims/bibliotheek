@props(['disabled' => false])

<select
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'rounded-xl shadow-sm border-border focus:border-primary focus:ring focus:ring-cyan-300 focus:ring-opacity-50 disabled:bg-gray-100']) !!}
>
    {{ $slot }}
</select>
