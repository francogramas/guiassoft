<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadempleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidadempleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleados_id')->unsigned()->index();
            $table->integer('especialidad_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('empleados_id')->references('id')->on('empleados');
            $table->foreign('especialidad_id')->references('id')->on('especialidad');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('especialidad');
    }
}
