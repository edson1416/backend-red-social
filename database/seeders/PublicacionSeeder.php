<?php

namespace Database\Seeders;

use App\Models\Comentarios;
use App\Models\ConfigPublicacion;
use App\Models\ImgPublicaciones;
use App\Models\Publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //publicacion amigo
        $publicacionAmigo = Publicacion::create([
            'body' => 'Hola mundo',
            'user_id' => 2,
        ]);

        ImgPublicaciones::create([
            'id_publicacion' => $publicacionAmigo->id,
            'ruta' => 'http://localhost',
        ]);
        Comentarios::create([
            'comentario' => 'comentario de prueba amigo',
            'id_publicacion' => $publicacionAmigo->id,
            'id_autor' => 1,
        ]);
        ConfigPublicacion::create([
            'id_publicacion' => $publicacionAmigo->id,
            'id_visible_privacidad' => 1, //privado
            'id_comentario_privacidad' => 1,
        ]);
        //publicacion random publica

        $publicacionRandomPublica = Publicacion::create([
            'body' => 'Hola Laravel',
            'user_id' => 3,
        ]);

        ImgPublicaciones::create([
            'id_publicacion' => $publicacionRandomPublica->id,
            'ruta' => 'http://localhost',
        ]);
        Comentarios::create([
            'comentario' => 'comentario de prueba',
            'id_publicacion' => $publicacionRandomPublica->id,
            'id_autor' => 1,
        ]);

        ConfigPublicacion::create([
            'id_publicacion' => $publicacionRandomPublica->id,
            'id_visible_privacidad' => 2 ,//publica
            'id_comentario_privacidad' => 1
        ]);

        //publicacion random privada
        $publicacionRandomPrivada = Publicacion::create([
            'body' => 'Hola privado',
            'user_id' => 3,
        ]);

        ImgPublicaciones::create([
            'id_publicacion' => $publicacionRandomPrivada->id,
            'ruta' => 'http://localhost',
        ]);

        ConfigPublicacion::create([
            'id_publicacion' => $publicacionRandomPrivada->id,
            'id_visible_privacidad' => 1,
            'id_comentario_privacidad' => 1,
        ]);
    }
}
