<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Ticket') }}
        </h2>
    </x-slot>

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-8">
                    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <x-input-label for="title" :value="__('Ticket Subject')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="priority" :value="__('Priority Level')" />
                            <select name="priority" id="priority" class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="description" :value="__('Detailed Description')" />
                            <textarea id="description" name="description" rows="5" class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="attachment" :value="__('Attach File (Image or PDF)')" />
                            <input type="file" id="attachment" name="attachment" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100" />
                            <p class="mt-1 text-xs text-gray-500">Max size: 2MB</p>
                            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Submit Ticket') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>