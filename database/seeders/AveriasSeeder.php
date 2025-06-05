<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Averia;
use Carbon\Carbon;

class AveriasSeeder extends Seeder
{
    public function run()
    {
        Averia::create([
            'equipo_id' => 11, // Cambia al id de un equipo válido
            'descripcion' => 'Avería de prueba hace un año y un mes',
            'fecha_creacion' => Carbon::now()->subYear()->subMonth(),
        ]);
    }
}
