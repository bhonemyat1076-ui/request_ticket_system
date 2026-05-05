<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Ticket') }}
            </h2>
            <a href="{{ route('user.all-tickets.show') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Back to My Tickets
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
            <div class="p-8">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $ticket->title }}</h3>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span>Submitted {{ $ticket->created_at->diffForHumans() }}</span>
                        <span>•</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                            @if($ticket->status == 'open') bg-red-100 text-red-800
                            @elseif($ticket->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($ticket->status == 'success') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                        <span>•</span>
                        <span>{{ ucfirst($ticket->priority) }} Priority</span>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Description</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $ticket->description }}</p>
                    </div>
                </div>

                @if($ticket->attachment)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Attachment</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <img src="{{ Storage::url($ticket->attachment) }}" alt="Ticket Attachment" class="max-w-full h-auto rounded mb-4">
                    </div>
                </div>
                @endif

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('user.edit-tickets.show', $ticket->id) }}"
                       class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Ticket
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>