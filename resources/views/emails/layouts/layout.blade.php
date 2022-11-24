<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font family -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
        * {font-family: 'Inter', sans-serif;}
        .max-w-3xl {max-width: 48rem;}
        .mx-auto {margin-left: auto;margin-right: auto;}
        .bg-background {--tw-bg-opacity: 1;background-color: rgb(244 244 244 / var(--tw-bg-opacity));}
        .bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}
        .rounded-lg{border-radius:.5rem}
        .py-3 {padding-top: 0.75rem;padding-bottom: 0.75rem;}
        .px-5 {padding-left: 1.25rem;padding-right: 1.25rem;}
        .flex {display: flex}
        .justify-center {justify-content: center}
        .text-3xl {font-size:1.875rem;line-height:2.25rem;}
        .font-bold {font-weight:700}
        .text-primary-dark {--tw-text-opacity: 1;color:rgb(6 182 212 / var(--tw-text-opacity))}
        .mb-8 {margin-bottom: 2rem;}

        /*md*/
        @media (min-width: 768px) {

        }
    </style>
</head>
    <body class="max-w-3xl mx-auto bg-background">
    <div class="flex justify-center">
        <h1 class="text-3xl font-bold text-primary-dark">Bibliotheek</h1>
    </div>
    @yield('content')
    </body>
</html>
