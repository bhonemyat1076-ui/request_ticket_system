<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ticket') }}</title>

        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0a0a0a] relative overflow-hidden">
        
        <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-red-700 to-transparent opacity-40 blur-3xl"></div>

        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="w-32 h-auto" alt="Logo">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-xl border-t-4 border-red-600 z-10 mx-4">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
