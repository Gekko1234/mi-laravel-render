<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']); // Elimina la FK actual
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']);
            // Restaurar la FK anterior sin cascade
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('restrict');
        });
    }
};
