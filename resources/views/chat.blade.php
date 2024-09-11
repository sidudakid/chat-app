

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat: ') }}
        </h2>
    </x-slot>
    @if (auth()->user()->is_admin)
    @livewire('chat-component', ['user_id' => $id])
@else
    @livewire('chat-component', ['user_id' => 1])
@endif


    
</x-app-layout>
