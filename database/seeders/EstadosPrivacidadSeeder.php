<?php

namespace Database\Seeders;

use App\Models\EstadosPrivacidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosPrivacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'estado' => 'Privado',
                'descripcion' => 'Solamente puede verlo tus amigos'
            ],
            [
                'estado' => 'Publico',
                'descripcion' => 'Puede verlo todas las personas'
            ],
        ])->each(function ($estado) {
            EstadosPrivacidad::create($estado);
        });
    }
}
