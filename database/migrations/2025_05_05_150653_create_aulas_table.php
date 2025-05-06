<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id(); // ID del aula
            $table->string('nombre'); // Nombre del aula (por ejemplo, "Aula 101")
            $table->enum('ala', ['A', 'B']); // Ala del instituto
            $table->enum('planta', [0, 1, 2]); // Planta (0, 1, 2)
            $table->json('coordenadas'); // Coordenadas del aula (puntos para el polígono)
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('aulas');
    }
}
