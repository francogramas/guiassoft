<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpeladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('empleados',
            function($table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido1', 30);
            $table->string('apellido2', 30);
            $table->integer('tipodocumentopaci_id')->index()->unsigned();
            $table->string('documento', 30)->unique();
            $table->integer('ciudad_id')->index()->unsigned();
            $table->string('telefono', 30);
            $table->string('direccion', 255);
            $table->string('correo', 50)->unique();
            $table->integer('estadoempleados_id')->index()->unsigned();
            $table->integer('sexo_id')->unsigned()->index();
            $table->date('nacimiento');
            $table->integer('role_id')->index()->unsigned();            
            $table->timestamps();
            

            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('tipodocumentopaci_id')->references('id')->on('tipodocumentopaci');
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->foreign('estadoempleados_id')->references('id')->on('estadoempleados');
            $table->foreign('role_id')->references('id')->on('role');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
