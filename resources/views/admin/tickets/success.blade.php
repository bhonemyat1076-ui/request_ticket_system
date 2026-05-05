<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-check-circle mr-2 text-green-600"></i>
            {{ __('Success Tickets') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 bg-gray-50 border-b border-gray-100 flex justify-between items-center">
                    <span class="text-sm font-bold text-gray-700 uppercase tracking-wider">Queue Management</span>
                    <span class="text-xs text-gray-500">Showing {{ $tickets->firstItem() }} - {{ $tickets->lastItem() }} of {{ $tickets->total() }}</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#0a0a0a] text-white">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Requester</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Subject</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Priority</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Submitted</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($tickets as $ticket)
                                <tr class="hover:bg-green-50/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-9 w-9 rounded-full bg-green-600 flex items-center justify-center text-white font-black text-sm shadow-sm">
                                                {{ strtoupper(substr($ticket->user->name, 0, 1)) }}
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-bold text-gray-900">{{ $ticket->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $ticket->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $ticket->title }}</div>
                                        <div class="text-xs text-gray-500 truncate w-64">{{ Str::limit($ticket->description, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $badgeStyle = match($ticket->priority) {
                                                'high' => 'bg-red-100 text-red-700 border-red-200',
                                                'medium' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                                'low' => 'bg-green-100 text-green-700 border-green-200',
                                            };
                                        @endphp
                                        <span class="px-3 py-1 text-[10px] font-black rounded-full border {{ $badgeStyle }}">
                                            {{ strtoupper($ticket->priority) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs font-bold text-gray-900">{{ $ticket->created_at->diffForHumans() }}</div>
                                        <div class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $ticket->created_at->format('M d, Y @ H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.tickets.show', $ticket) }}" 
                                           class="inline-flex items-center px-3 py-1.5 bg-white border border-green-600 text-green-600 text-xs font-bold rounded-md hover:bg-green-600 hover:text-white transition shadow-sm">
                                            Manage
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-gray-400 italic">No recent success tickets found.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
</x-app-layout>