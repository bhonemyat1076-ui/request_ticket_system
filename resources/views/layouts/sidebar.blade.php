<div class="flex flex-col h-full overflow-y-auto py-4">
    <nav class="flex-1 px-4 space-y-2">
        @php
            $dashboardRoute = Auth::user()->is_admin ? 'admin.dashboard' : 'user.dashboard';
        @endphp
        
        <x-sidebar-link :href="route($dashboardRoute)" :active="request()->routeIs($dashboardRoute)">
            <i class="fas fa-home mr-2"></i> {{ __('Dashboard') }}
        </x-sidebar-link>

        <hr class="border-red-900/20 my-4">

        @if(!Auth::user()->is_admin)
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 px-2">Support</p>
           <x-sidebar-link :href="route('tickets.create')" :active="request()->routeIs('tickets.create')">
                <i class="fas fa-plus-circle mr-2 text-red-600"></i> {{ __('Create Ticket') }}
            </x-sidebar-link>
            
            <div x-data="{ open: {{ request()->routeIs('tickets.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" 
                        class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-red-900/20 rounded-lg transition-all duration-200">
                    <span class="flex items-center">
                        <i class="fas fa-ticket-alt mr-2 text-red-600"></i> {{ __('My Tickets') }}
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     class="mt-2 ml-6 space-y-1 border-l border-red-900/30">

                    <x-sidebar-link href="{{ route('user.all-tickets.show') }}" class="py-2 text-xs">
                         {{ __('All Tickets') }}    
                    </x-sidebar-link>

                    <x-sidebar-link href="{{ route('user.open-tickets.show') }}" class="py-2 text-xs">
                         {{ __('Open Tickets') }}
                    </x-sidebar-link>

                    <x-sidebar-link href="{{ route('user.pending-tickets.show') }}" class="py-2 text-xs">
                         {{ __('Pending Tickets') }}
                    </x-sidebar-link>

                    <x-sidebar-link href="{{ route('user.success-tickets.show') }}" class="py-2 text-xs">
                         {{ __('Success Tickets') }}
                    </x-sidebar-link>

                    <x-sidebar-link href="#" class="py-2 text-xs">
                         {{ __('Ticket History') }}
                    </x-sidebar-link>
                </div>
            </div>
        @endif

        @if(Auth::user()->is_admin)
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 px-2">Management</p>

            <x-sidebar-link href="{{ route('admin.tickets.open') }}" :active="false">
                <i class="fas fa-flag mr-2 text-red-600"></i> {{ __('Open Tickets') }}
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('admin.tickets.pending') }}" :active="false">
                <i class="fas fa-clock mr-2 text-red-600"></i> {{ __('Pending Tickets') }}
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('admin.tickets.success') }}" :active="false">
                <i class="fas fa-check-circle mr-2 text-red-600"></i> {{ __('Success Tickets') }}
            </x-sidebar-link>
            
            <x-sidebar-link href="{{ route('admin.tickets.history') }}" :active="false">
                <i class="fas fa-history mr-2 text-red-600"></i> {{ __('Tickets History') }}
            </x-sidebar-link>
            
            <x-sidebar-link href="#" :active="false">
                <i class="fas fa-users mr-2 text-red-600"></i> {{ __('User List') }}
            </x-sidebar-link>
        @endif
    </nav>
</div>