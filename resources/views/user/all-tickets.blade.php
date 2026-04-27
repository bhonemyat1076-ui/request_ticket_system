<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Tickets') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <!-- Open Tickets Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-red-600">Open Tickets</h2>
                @if($openCount > 3)
                    <a href="{{ route('user.open-tickets.show') }}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
                        View All
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endif
            </div>
            @if($openTickets->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($openTickets as $ticket)
                        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded">Open</span>
                                <span class="text-xs text-gray-500">{{ $ticket->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="font-semibold text-lg mb-2">{{ $ticket->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($ticket->description, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs px-2 py-1 rounded bg-gray-100">{{ ucfirst($ticket->priority) }}</span>
                                <a href="{{ route('user.edit-tickets.show', $ticket->id) }}" class="text-sm text-blue-600 hover:underline">View</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No open tickets.</p>
            @endif
        </div>

        <!-- Pending Tickets Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-yellow-600">Pending Tickets</h2>
                @if($pendingCount > 3)
                    <a href="{{ route('user.pending-tickets.show') }}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
                        View All
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endif
            </div>
            @if($pendingTickets->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($pendingTickets as $ticket)
                        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">Pending</span>
                                <span class="text-xs text-gray-500">{{ $ticket->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="font-semibold text-lg mb-2">{{ $ticket->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($ticket->description, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs px-2 py-1 rounded bg-gray-100">{{ ucfirst($ticket->priority) }}</span>
                                <a href="{{ route('user.edit-tickets.show', $ticket->id) }}" class="text-sm text-blue-600 hover:underline">View</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No pending tickets.</p>
            @endif
        </div>

        <!-- Success Tickets Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-green-600">Success Tickets</h2>
                @if($successCount > 3)
                    <a href="{{ route('user.success-tickets.show') }}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
                        View All
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endif
            </div>
            @if($successTickets->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($successTickets as $ticket)
                        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">Success</span>
                                <span class="text-xs text-gray-500">{{ $ticket->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="font-semibold text-lg mb-2">{{ $ticket->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($ticket->description, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs px-2 py-1 rounded bg-gray-100">{{ ucfirst($ticket->priority) }}</span>
                                <a href="{{ route('user.edit-tickets.show', $ticket->id) }}" class="text-sm text-blue-600 hover:underline">View</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No success tickets.</p>
            @endif
        </div>
    </div>
</x-app-layout>