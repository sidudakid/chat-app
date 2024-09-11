<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Handle sending of chat messages.
     */
    public function send(Request $request)
    {
        // Validate the message
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // You can handle saving or broadcasting the message here
        // For now, we'll just return back to the chat view

        return redirect()->back()->with('status', 'Message sent!');
    }
}
