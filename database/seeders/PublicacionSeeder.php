<?php

namespace Database\Seeders;

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
                'url_imagen' => 'http://localhost',
                'user_id' => 2,
            ],
            [
                'body' => 'jajaj xd',
                'url_imagen' => 'http://localhost',
                'user_id' => 2,
            ],
            [
                'body' => 'No me interesa',
                'url_imagen' => 'http://localhost',
                'user_id' => 3,
            ]
        ])->each(function ($publicacion) {
            Publicacion::create($publicacion);
        });
    }
}
