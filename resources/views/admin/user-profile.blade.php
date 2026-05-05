<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border-t-4 border-red-600">
                <div class="flex items-center space-x-4">
                    <div class="h-16 w-16 rounded-full bg-red-600 flex items-center justify-center text-white font-black text-lg shadow-sm">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Account Details</h3>
                <div class="space-y-2">
                    <div>
                        <span class="font-semibold text-gray-700">User ID:</span>
                        <span class="text-gray-900">#{{ $user->id }}</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Role:</span>
                        <span class="text-gray-900">{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Joined:</span>
                        <span class="text-gray-900">{{ $user->created_at->format('M d, Y') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700">Email Verified:</span>
                        <span class="text-gray-900">{{ $user->email_verified_at ? 'Yes' : 'No' }}</span>
                    </div> </br>
                    <!-- password reset link -->
                    <a href="{{ route('password.request') }}" class="text-md font-bold bg-red-600
                     text-white px-4 py-2 rounded m-4 w-full hover:bg-red-700">Send Password Reset Link</a>   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>