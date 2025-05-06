<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('historial_reparaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('averia_id')->constrained('averias');
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->text('descripcion_reparacion');
            $table->decimal('coste', 8, 2)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_reparaciones');
    }
};
