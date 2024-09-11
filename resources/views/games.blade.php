<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Games</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($games as $game)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                                <!-- Game Image -->
                                <img src="{{ $game->image_url }}" alt="{{ $game->name }}" class="w-full h-48 object-cover">
                                
                                <!-- Game Details -->
                                <div class="p-4">
                                    <!-- Game Name -->
                                    <h3 class="text-lg font-semibold mb-2">{{ $game->name }}</h3>
                                    
                                    <!-- Game Link -->
                                    <a href="{{ $game->link }}" target="_blank" class="text-blue-500 hover:underline">
                                        Play {{ $game->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
