<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-4 sm:px-6 lg:px-8"> <!-- Utilizes the maximum width of the screen -->
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    @if (auth()->user()->is_admin)
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                                <a href="/chat/{{$user->id}}" class="text-blue-600 hover:text-blue-900">Chat</a>
                                                <a href="/edit/{{ $user->id }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>You do not have admin privileges.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
