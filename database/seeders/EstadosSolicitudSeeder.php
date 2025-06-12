<?php

namespace Database\Seeders;

use App\Models\EstadosSolicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'estado' => 'pendiente',
                'descripcion' => 'solicitud pendiente'
            ],
            [
                'estado' => 'aceptado',
                'descripcion' => 'solicitud aceptada'
            ],
        ])->each(function ($estado) {
            EstadosSolicitud::create($estado);
        });
    }
}
