<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCups1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cups',
            function($table) {
            $table->string('codigo',7)->index()->unique();
            $table->string('nombre',255);
            $table->string('sexo',1);
            $table->integer('edad_ini');
            $table->integer('edad_fin');
            $table->string('archivo',2);
            $table->string('qx',2);
            $table->string('tipo_procedimiento');
            $table->integer('no_maximo');
            $table->integer('no_minimo');
            $table->string('finalidad');
            $table->string('dx_requerido');
            $table->integer('edad_incial_dias');
            $table->integer('edad_final_dias');
            $table->string('pos',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cups');
    }
}
