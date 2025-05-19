<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAulasTable extends Migration
{
    public function up()
    {
        Schema::table('aulas', function (Blueprint $table) {
            // Añadimos nombre si no existe
            if (!Schema::hasColumn('aulas', 'nombre')) {
                $table->string('nombre')->after('id');
            }
            // Añadimos planta, pos_x y pos_y
            if (!Schema::hasColumn('aulas', 'planta')) {
                $table->integer('planta')->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('aulas', 'pos_x')) {
                $table->integer('pos_x')->nullable()->after('planta');
            }
            if (!Schema::hasColumn('aulas', 'pos_y')) {
                $table->integer('pos_y')->nullable()->after('pos_x');
            }
        });
    }

    public function down()
    {
        Schema::table('aulas', function (Blueprint $table) {
            if (Schema::hasColumn('aulas', 'nombre')) {
                $table->dropColumn('nombre');
            }
            if (Schema::hasColumn('aulas', 'planta')) {
                $table->dropColumn('planta');
            }
            if (Schema::hasColumn('aulas', 'pos_x')) {
                $table->dropColumn('pos_x');
            }
            if (Schema::hasColumn('aulas', 'pos_y')) {
                $table->dropColumn('pos_y');
            }
        });
    }
}
