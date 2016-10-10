<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTableN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('pacientes',
            function($table) {
            $table->increments('id');            
            $table->integer('tipodocumentopaci_id')->unsigned()->index();
            $table->string('documento',20);
            $table->integer('tipousuario_id')->unsigned()->index();            
            $table->string('apellido1', 30);
            $table->string('apellido2', 30);
            $table->string('nombre1', 20);
            $table->string('nombre2', 20)->default(' ');
            $table->date('nacimiento');
            $table->integer('sexo_id')->unsigned()->index();            
            $table->integer('ciudad_id')->unsigned()->index();
            $table->string('telefono',20);
            $table->string('correo',30)->default(' ');
            $table->string('direccion',255);
            $table->integer('zonaresidencia_id')->unsigned()->index();
            $table->integer('seguromedico_id')->unsigned()->index();                            
            $table->timestamps();
            
            $table->foreign('tipodocumentopaci_id')->references('id')->on('tipodocumentopaci');
            $table->foreign('tipousuario_id')->references('id')->on('tipousuario');
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->foreign('zonaresidencia_id')->references('id')->on('zonaresidencia');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('seguromedico_id')->references('id')->on('seguromedico');            
        });
    }

public function down()
    {
        Schema::drop('pacientes');
    }
}
