<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-users mr-2 text-red-600"></i>
                {{ __('User List') }}
            </h2>
            <span class="text-sm text-gray-500">{{ $users->total() }} users found</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
            <div class="p-6 bg-gray-50 border-b border-gray-100 flex justify-between items-center">
                <span class="text-sm font-bold text-gray-700 uppercase tracking-wider">User Management</span>
                <span class="text-xs text-gray-500">Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }}</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#0a0a0a] text-white">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">User</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Email</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-center">Role</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest">Joined</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-right">Status</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $user)
                            <tr class="hover:bg-red-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-9 w-9 rounded-full bg-red-600 flex items-center justify-center text-white font-black text-sm shadow-sm">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-500">ID: #{{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-3 py-1 text-[10px] font-black rounded-full border {{ $user->is_admin ? 'bg-red-100 text-red-700 border-red-200' : 'bg-gray-100 text-gray-700 border-gray-200' }}">
                                        {{ $user->is_admin ? 'ADMIN' : 'USER' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-xs font-bold text-gray-900">{{ $user->created_at->diffForHumans() }}</div>
                                    <div class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $user->created_at->format('M d, Y') }}</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="px-3 py-1 text-[10px] font-black rounded-full border {{ $user->email_verified_at ? 'bg-green-100 text-green-700 border-green-200' : 'bg-yellow-100 text-yellow-700 border-yellow-200' }}">
                                        {{ $user->email_verified_at ? 'VERIFIED' : 'UNVERIFIED' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.users.show', $user) }}" class="text-sm font-bold text-red-600 hover:underline">View Profile</a>    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="text-gray-400 italic">No users found.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
