<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');            
            $table->integer('agendaestado_id')->unsigned()->index();
            $table->integer('pacientes_id')->unsigned()->index();
            $table->integer('empleados_id')->unsigned()->index();
            $table->integer('seguromedico_id')->unsigned()->index();
            $table->integer('contratos_id')->unsigned()->index();
            $table->integer('especialidad_id')->unsigned()->index();
            $table->integer('instalacion_id')->unsigned()->index();
            $table->integer('tipousuario_id')->unsigned()->index();
            $table->integer('users_id')->unsigned()->index();

            $table->foreign('agendaestado_id')->references('id')->on('agendaestado');
            $table->foreign('pacientes_id')->references('id')->on('pacientes');
            $table->foreign('empleados_id')->references('id')->on('empleados');
            $table->foreign('seguromedico_id')->references('id')->on('seguromedico');
            $table->foreign('contratos_id')->references('id')->on('contratos');
            $table->foreign('especialidad_id')->references('id')->on('especialidad');
            $table->foreign('instalacion_id')->references('id')->on('instalacion');
            $table->foreign('tipousuario_id')->references('id')->on('tipousuario');
            $table->foreign('users_id')->references('id')->on('users');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agenda');
    }
}
