<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Material Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-background text-basis min-h-screen w-full flex flex-col">
        @include('layouts.navigation')

        <div class="flex-1">
            <main>
                @include('layouts.flash-messages')

                {{ $slot }}
            </main>
        </div>

        @include('layouts.footer')
    </body>
</html>
