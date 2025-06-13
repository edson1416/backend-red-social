<?php

namespace Database\Seeders;

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
        collect([
            [
                'body' => 'Hola mundo',
                'user_id' => 2,
            ],
            [
                'body' => 'Hola Laravel',
                'user_id' => 3,
            ],
        ])->each(function ($item) {
            $publicacion = Publicacion::create($item);
            ImgPublicaciones::create([
                'id_publicacion' => $publicacion->id,
                'ruta' => 'http://localhost',
            ]);
        });
    }
}
