<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSendEvent;
use Livewire\Attributes\On;

class ChatComponent extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = ''; // For input field
    public $messages = []; // To store chat messages

    // Render the component
    public function render()
    {
        return view('livewire.chat-component');
    }

    // Load initial data
    public function mount($user_id)
    {
        $this->sender_id = Auth::user()->id;
    
        if (auth()->user()->is_admin) {
            $this->receiver_id = $user_id;
        } else {
            $this->receiver_id = 1; // Admin or specific user ID
        }
    
        // Load chat messages between the sender and receiver
        $messages = Message::where(function ($query) {
            $query->where('sender_id', $this->sender_id)
                  ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                  ->where('receiver_id', $this->sender_id);
        })->with('sender:id,name', 'receiver:id,name') // Eager load sender and receiver data
        ->get(); // This 
        foreach ($messages as $message) {
            $this->appendChatMessage($message);
        }
        $this->user = User::whereId($user_id)->first();
    }
    
    

    public function sendMessage()
    {
        // Create a new message instance
        $chatMessage = new Message();
        $chatMessage->sender_id = $this->sender_id;
        $chatMessage->receiver_id = $this->receiver_id;
        $chatMessage->message = $this->message;
        $chatMessage->save();
        $this->appendChatMessage($chatMessage);
        // Broadcast the new message
        broadcast(new MessageSendEvent($chatMessage))->toOthers();


        // Clear the input field
        $this->message = '';

    }
    #[On('echo-private:chat-channel.{sender_id},MessageSendEvent')]
    public function listenForMessage($event){
        $chatMessage = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();
    
        $this->appendChatMessage($chatMessage);
    }


    public function appendChatMessage($message){
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name
        ];
        // dd($this->messages);
    }



}
