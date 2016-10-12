<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguromedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('seguromedico',
            function($table) {
            $table->increments('id');    
            $table->string('tipo', 20);                
            $table->string('codigo', 6);
            $table->string('nit', 20);            
            $table->string('razonsocial', 60);            
            $table->string('direccion', 255);
            $table->string('telefono', 50);
            $table->integer('ciudad_id')->index()->unsigned();

            $table->timestamps();
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguromedico');
    }
}
