<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCiudadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ciudades', function($table) {
             $table->string('codigo',3);
        });

        Schema::table('estados', function($table) {
             $table->string('codigo',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ciudades', function($table) {
             $table->dropColumn('codigo');
        });

        Schema::table('estados', function($table) {
             $table->dropColumn('codigo');
        });
    }
}
