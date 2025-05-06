<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Ejecuta las semillas de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador con todos los campos
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),  
            'apellidos' => 'Administador Apellido',  // Apellidos del usuario
            'cargo' => 'Administrador',  // Cargo del usuario
            'departamento' => 'Administración',  // Departamento del usuario
            'telefono' => '123456789',  // Teléfono de contacto
            'es_admin' => true,  // Marcarlo como administrador
        ]);
    }
}
