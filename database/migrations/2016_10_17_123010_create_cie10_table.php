<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCie10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cie10',
            function($table) {
            $table->increments('id');            
            $table->string('codigo',4)->index();            
            $table->string('sexo',1);    
            $table->integer('LIM_INF');
            $table->integer('LIM_SUP');
            $table->string('NO_PRIN');
            $table->string('OBSERVACIONES');
            $table->integer('GRUPO_MORTALIDAD');
            $table->string('capitulo',3)->index();            
            $table->integer('ID_SUBGRUPO');
            $table->integer('sivigila');
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cie10');
    }
}
