<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            
            <a href="{{ route('tickets.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Create New Ticket') }}
            </a>
        </div>
    </x-slot>
    <div class="py-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-gray-800 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Total Tickets') }}</p>
                <p class="text-2xl font-bold text-gray-900">{{ $totalTickets ?? 0 }}</p>
            </div>
            <div class="bg-gray-100 p-3 rounded-full">
                <i class="fas fa-ticket-alt text-gray-600"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Pending') }}</p>
                <p class="text-2xl font-bold text-gray-900">{{ $pendingTickets ?? 0 }}</p>
            </div>
            <div class="bg-yellow-50 p-3 rounded-full">
                <i class="fas fa-clock text-yellow-600"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-600 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Resolved') }}</p>
                <p class="text-2xl font-bold text-gray-900">{{ $resolvedTickets ?? 0 }}</p>
            </div>
            <div class="bg-red-50 p-3 rounded-full">
                <i class="fas fa-check-circle text-red-600"></i>
            </div>
        </div>

    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
        </div>
</div>
</x-app-layout>