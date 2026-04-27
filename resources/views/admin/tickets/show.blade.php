<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ticket #{{ $ticket->id }}: {{ $ticket->title }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-red-600 font-medium transition">
                &larr; Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-8 shadow-sm sm:rounded-lg border border-gray-200 overflow-hidden">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Description</h3>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap break-words">
                           {{ $ticket->description }}
                           @if($ticket->attachment)
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                            <h4 class="text-sm font-semibold text-gray-600 mb-2">Attached File:</h4>
                            <img src="{{ asset('storage/' . $ticket->attachment) }}" alt="Ticket Attachment" class="max-w-full h-auto rounded-md shadow-sm border border-gray-200">
                        </div>
                    @endif
                        </p>
                    
                    
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-[#0a0a0a] text-white p-6 shadow-sm sm:rounded-lg border border-red-900/30">
                    <h3 class="font-bold mb-4 flex items-center">
                        <i class="fas fa-cog mr-2 text-red-600"></i> Manage Ticket
                    </h3>
                    
                    <form action="{{ route('admin.tickets.updateStatus', $ticket) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label class="block text-xs uppercase tracking-widest text-gray-400 mb-2">Change Status</label>
                        <select name="status" class="w-full bg-black border-red-900 text-gray-300 rounded-md focus:ring-red-600 focus:border-red-600 mb-4">
                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="closed" {{ $ticket->status == 'success' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded transition shadow-lg shadow-red-900/20">
                            Update Status
                        </button>
                    </form>
                </div>

                <div class="bg-white p-6 shadow-sm sm:rounded-lg border border-gray-200">
                    <h3 class="font-bold text-gray-900 mb-4 border-b pb-2">Requester Info</h3>
                    <div class="space-y-3">
                        <p class="text-sm"><span class="text-gray-500">Name:</span> {{ $ticket->user->name }}</p>
                        <p class="text-sm"><span class="text-gray-500">Email:</span> {{ $ticket->user->email }}</p>
                        <p class="text-sm"><span class="text-gray-500">Priority:</span> 
                            <span class="font-bold {{ $ticket->priority == 'high' ? 'text-red-600' : 'text-gray-700' }}">
                                {{ strtoupper($ticket->priority) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>