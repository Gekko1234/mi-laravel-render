<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('equipos', function (Blueprint $table) {
        $table->id();  // Esto es auto-incrementable
        $table->string('nombre');
        $table->string('marca');
        $table->string('modelo');
        $table->string('numero_serie');
        $table->date('fecha_adquisicion');
        $table->enum('estado', ['Disponible', 'En uso', 'En reparación', 'Dado de baja']);
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
