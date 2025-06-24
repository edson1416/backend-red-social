<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ImgMensajes;
use App\Models\Mensajes;
use App\Models\MiembrosChat;
use App\Models\MiembrosChats;
use App\Models\MisChats;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creando chat
        $chat = Chat::create();

        //mis chats
        collect([
            [
                'user_id' => 1,
                'chat_id' => $chat->id,
            ],
            [
                'user_id' => 2,
                'chat_id' => $chat->id,
            ],
        ])->each(function ($miChat) {
            MisChats::create($miChat);
        });

        //miembros del chat
        collect([
            [
                'user_id' => 1,
                'chat_id' => $chat->id,
            ],
            [
                'user_id' => 2,
                'chat_id' => $chat->id,
            ],
        ])->each(function ($miChat) {
            MiembrosChats::create($miChat);
        });

        //mensajes del chat
        $mensaje1 = Mensajes::create([
           'chat_id' => $chat->id,
           'user_id' => 1,
           'mensaje' => 'Hola celinaaa',
        ]);

        $mensaje2 = Mensajes::create([
            'chat_id' => $chat->id,
            'user_id' => 2,
            'mensaje' => 'Hola edson',
        ]);

        //img imagen
        ImgMensajes::create([
            'url_img' => 'http://localhost',
            'mensaje_id' => $mensaje2->id,
        ]);
    }
}
