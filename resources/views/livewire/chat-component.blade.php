<div>
    <!-- Chat Messages -->
    <div id="messages-container" class="mb-4 h-96 overflow-y-auto bg-gray-100 rounded-lg p-4" style="max-height: 800px;">
        @foreach ($messages as $message)
            <div class="mb-4">
                @if($message['sender'] != auth()->user()->name)
                    <!-- Receiver Messages (Left) -->
                    <div class="flex justify-start">
                        <img src="{{ asset('uploads/profile/' . $message['sender'] . '.png') }}" class="w-6 h-6 rounded-full mr-3" alt="{{ $message['sender'] }}">
                        <div class="max-w-xs bg-gray-200 p-3 rounded-lg shadow-md">
                            <p class="text-sm font-semibold text-gray-900">{{ $message['sender'] }}</p>
                            <p class="text-gray-700">{{ $message['message'] }}</p>
                        </div>
                    </div>
                @else
                    <!-- Sender Messages (Right) -->
                    <div class="flex justify-end">
                        <div class="max-w-xs bg-blue-500 text-white p-3 rounded-lg shadow-md">
                            {{-- <p class="text-sm font-semibold">{{ auth()->user()->name }}</p> --}}
                            <p>{{ $message['message'] }}</p>
                        </div>
                        <img src="{{ asset('uploads/profile/' . auth()->user()->name . '.png') }}" class="w-6 h-6 rounded-full ml-3" alt="{{ auth()->user()->name }}">
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Input Field and Send Button -->
    <div class="flex mt-4">
        <input wire:model="message" type="text" class="flex-grow p-2 border rounded-lg" id="message-input-box" placeholder="Type a message...">
        <button wire:click="sendMessage" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" onclick="msgButtonclicked">
            Send
        </button>
    </div>
</div>

    <!-- Auto-scroll to the latest message when the component updates -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var messagesContainer = document.getElementById('messages-container');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        });

            function msgButtonclicked() {
                var remove_msg = document.getElementById('message-input-box').value("")
            }

        // Automatically scroll to the bottom when a new message is sent
        window.addEventListener('message-sent', function () {
            var messagesContainer = document.getElementById('messages-container');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        });
    </script>
</div>