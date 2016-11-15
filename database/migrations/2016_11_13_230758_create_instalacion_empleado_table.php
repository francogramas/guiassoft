<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstalacionEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacion_empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->time('horai');
            $table->time('horaf');
            $table->integer('instalacion_id')->unsigned()->index();
            $table->integer('empleados_id')->unsigned()->index();
            $table->integer('diasemana_id')->unsigned()->index();
            $table->integer('intervalo');

            $table->timestamps();

            $table->foreign('instalacion_id')->references('id')->on('instalacion');
            $table->foreign('empleados_id')->references('id')->on('empleados');
            $table->foreign('diasemana_id')->references('id')->on('diasemana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instalacion_empleado');
    }
}
