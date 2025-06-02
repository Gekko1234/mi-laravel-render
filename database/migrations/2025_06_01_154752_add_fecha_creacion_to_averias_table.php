<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('averias', function (Blueprint $table) {
            $table->timestamp('fecha_creacion')->nullable()->after('descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('averias', function (Blueprint $table) {
            $table->dropColumn('fecha_creacion');
        });
    }
};
