<?php

namespace Database\Seeders;

use App\Models\Amigos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmigosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amigos::create([
            'user_id' => 1,
            'amigo_id' => 2,
        ]);
    }
}
