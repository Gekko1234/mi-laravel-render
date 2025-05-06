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
        Schema::create('averias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->nullable()->constrained()->onDelete('set null'); // Relación con 'equipos'
            $table->foreignId('tecnico_id')->nullable()->constrained()->onDelete('set null'); // Relación con 'tecnicos'
            $table->timestamp('fecha_reporte');
            $table->text('descripcion');
            $table->enum('estado', ['Pendiente', 'En reparación', 'Resuelto']);
            $table->timestamp('fecha_resolucion')->nullable();
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('averias');
    }
};
