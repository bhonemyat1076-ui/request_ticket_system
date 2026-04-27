<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
    <div class="p-6 text-gray-900 font-bold border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
        <span class="flex items-center">
            <i class="fas fa-envelope-open-text mr-2 text-red-600"></i>
            {{ __("Recent Open Tickets") }}
        </span>
        <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full font-bold">
            {{ $openCount }} TOTAL OPEN
        </span>
    </div>

    <div class="overflow-x-auto text-sm">
        <table class="w-full text-left border-collapse">
            <thead class="bg-[#0a0a0a] text-white">
                <tr>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider text-center">Priority</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($recentOpenTickets as $ticket)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $ticket->user->name }}</td>
                        <td class="px-6 py-4 truncate max-w-xs">{{ $ticket->title }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 text-[10px] font-black rounded border {{ $ticket->priority == 'high' ? 'bg-red-50 text-red-600 border-red-200' : 'bg-gray-100 text-gray-600 border-gray-200' }}">
                                {{ strtoupper($ticket->priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.tickets.show', $ticket) }}" class="text-red-600 hover:text-red-800 font-bold">
                                Review &rarr;
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-400 italic">
                            Great job! No open tickets at the moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 bg-gray-50 text-center border-t border-gray-100">
        <a href="{{ route('admin.tickets.open') }}" class="inline-flex items-center text-sm font-bold text-gray-700 hover:text-red-600 transition">
            {{ __('View All Open Tickets') }}
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
        </a>
    </div>
</div>
</x-app-layout>