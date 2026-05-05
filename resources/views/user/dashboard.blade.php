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
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

            <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-gray-800 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Total Tickets') }}</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalTickets ?? 0 }}</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-full">
                    <i class="fas fa-ticket-alt text-gray-600"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-600 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Open Tickets') }}</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $openTickets ?? 0 }}</p>
                </div>
                <div class="bg-red-50 p-3 rounded-full">
                    <i class="fas fa-flag text-red-600"></i>
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

            <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-600 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Recent Success') }}</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $successTickets ?? 0 }}</p>
                </div>
                <div class="bg-green-50 p-3 rounded-full">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>

        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
            <div class="p-6 bg-gray-50 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('Recent Tickets') }}</h3>
                <p class="text-sm text-gray-500 mb-4">Your 5 most recently submitted tickets. Click "View" to edit or check status.</p>

                @if($recentTickets->isEmpty())
                    <div class="text-center py-10">
                        <i class="fas fa-ticket-alt text-gray-400 text-4xl mb-4"></i>
                        <p class="text-sm text-gray-500">You haven't submitted any tickets yet.</p>
                    </div>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach($recentTickets as $ticket)
                            <li class="py-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $ticket->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $ticket->created_at->diffForHumans() }}</p>
                                </div>
                                <a href="{{ route('user.tickets.show', $ticket->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-white border border-green-600 text-green-600 text-xs font-bold rounded-md hover:bg-green-600 hover:text-white transition shadow-sm">
                                    View
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>