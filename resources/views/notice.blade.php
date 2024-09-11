<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Notices</h2>
                    <div class="space-y-6">
                        @foreach ($notices as $notice)
                            <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                <div class="flex justify-between items-center">
                                    <!-- Notice Title -->
                                    <h3 class="text-xl font-semibold">{{ $notice->title }}</h3>
                                    
                                    <!-- Impact Level Badge -->
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                                        @if ($notice->impact_level == 'critical')
                                            bg-red-500 text-white
                                        @elseif ($notice->impact_level == 'medium')
                                            bg-yellow-500 text-white
                                        @elseif ($notice->impact_level == 'low')
                                            bg-green-500 text-white
                                        @else
                                            bg-gray-300 text-gray-700
                                        @endif">
                                        {{ ucfirst($notice->impact_level ?? 'No Impact') }}
                                    </span>
                                </div>
    
                                <!-- Notice Content -->
                                <p class="mt-4 text-gray-700 dark:text-gray-300">
                                    {{ $notice->content }}
                                </p>
    
                                <!-- Posted by and Date -->
                                <div class="mt-4 text-sm text-gray-500">
                                    <p>
                                        Posted by: <span class="font-semibold">{{ $notice->user->name }}</span>
                                    </p>
                                    <p>
                                        Posted on: {{ $notice->created_at->format('F j, Y') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
