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
   <body class="font-sans antialiased bg-[#f4f6f9] text-gray-900" 
      x-data="{ sidebarOpen: true }">
    <div class="min-h-screen flex flex-col">
        
        @include('layouts.navigation')

        <div class="flex flex-1 overflow-hidden">
            <aside class="bg-[#0a0a0a] border-r border-red-900/20 
                   transition-all duration-300 ease-in-out
                   fixed top-15 left-0 h-full"
           :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'">
        @include('layouts.sidebar')
            </aside>

            <main class="flex-1 overflow-y-auto transition-all duration-300"
          :class="sidebarOpen ? 'ml-64' : 'ml-0'">
        @if (isset($header))
            <header class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    </main>


        </div>
    </div>
</body>
</html>
