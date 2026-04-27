<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pending Tickets') }}
            </h2>
            <a href="{{ route('user.all-tickets.show') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Back to All Tickets
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        @if($tickets->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($tickets as $ticket)
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
</x-app-layout>