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
        Schema::create('config_publicaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_publicacion')->constrained('publicaciones');
            $table->foreignId('id_visible_privacidad')->constrained('estados_privacidad');
            $table->foreignId('id_comentario_privacidad')->constrained('estados_privacidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_publicaciones');
    }
};
