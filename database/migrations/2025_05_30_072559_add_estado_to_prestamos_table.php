<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->enum('estado', ['Prestado', 'Sin prestar'])->default('Prestado');
    });
}

public function down(): void
{
    Schema::table('prestamos', function (Blueprint $table) {
        $table->dropColumn('estado');
    });
}

};
