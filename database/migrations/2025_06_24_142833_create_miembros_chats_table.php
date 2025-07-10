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
        Schema::create('miembros_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment("miembro del chat")->constrained('users');
            $table->foreignId('chat_id')->comment("chat")->constrained('chats');
            $table->string('cliente_socket_id')->nullable();
            $table->boolean('in_chat')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros_chats');
    }
};
