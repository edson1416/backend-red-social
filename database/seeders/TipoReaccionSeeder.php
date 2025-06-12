<?php

namespace Database\Seeders;

use App\Models\TipoReaccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoReaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['nombre_tipo_reaccion' => 'me gusta'],
            ['nombre_tipo_reaccion' => 'me encanta'],
            ['nombre_tipo_reaccion' => 'me enoja'],
            ['nombre_tipo_reaccion' => 'me entristece']
        ])->each(function ($tipoReaccion) {
            TipoReaccion::create($tipoReaccion);
        });
    }
}
