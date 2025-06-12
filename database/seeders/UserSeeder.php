<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'Edson Sarmiento',
                'email' => 'edson.sarmiento@gmail.com',
                'password' => bcrypt('edson1416'),
                'direccion' => "Col. Costa Rica",
                'telefono' => "73032997",
                'fecha_nacimiento' => "2000-04-10",
            ],
            ['name' => 'Celina Martinez',
                'email' => 'celi@gmail.com',
                'password' => bcrypt('password'),
                'direccion' => "Col. Costa Rica",
                'telefono' => "75022997",
                'fecha_nacimiento' => "2000-08-31",
            ],
            ['name' => 'Juan Pablo',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('password'),
            'direccion' => "Col. Costa Rica",
            'telefono' => "73032989",
            'fecha_nacimiento' => "2000-04-10",
            ]
        ])->each(function ($user) {
            User::create($user);
        });
    }
}
