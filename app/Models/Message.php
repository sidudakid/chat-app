<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = ['sender_id', 'receiver_id', 'message', 'image'];

    // Relationship to get the sender of the message
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relationship to get the receiver of the message
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
