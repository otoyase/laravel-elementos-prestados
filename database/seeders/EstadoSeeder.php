<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create([

            'estado' => 'Prestado',

        ]);

        Estado::create([

            'estado' => 'Disponible',

        ]);

        Estado::create([

            'estado' => 'Pendiente Devolucion',

        ]);

        Estado::create([

            'estado' => 'Devuelto',

        ]);
    }
}
