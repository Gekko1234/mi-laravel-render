<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFechaDevolucionNullableInPrestamos extends Migration
{
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dateTime('fecha_devolucion')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dateTime('fecha_devolucion')->nullable(false)->change();
        });
    }
}
