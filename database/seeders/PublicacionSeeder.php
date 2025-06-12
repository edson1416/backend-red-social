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
        Publicacion::create([
            'body' => 'Hola mundo',
            'url_imagen' => 'http://localhost',
            'user_id' => 1,
        ]);
    }
}
