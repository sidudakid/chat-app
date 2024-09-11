<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            
            // Foreign key for the sender (references the 'users' table)
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            
            // Foreign key for the receiver (references the 'users' table)
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            
            // Message content
            $table->text('message');
            
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
