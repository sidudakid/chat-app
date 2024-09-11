<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'facebook_link', 'is_admin',
    ];

    // Relationship for messages sent by the user
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Relationship for messages received by the user
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // Combined messages relationship (optional)
    public function allMessages()
    {
        return $this->sentMessages->merge($this->receivedMessages);
    }
}
?>