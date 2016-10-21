<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('contratos',
            function($table) {
            $table->increments('id');
            $table->string('numero', 15);
            $table->integer('seguromedico_id')->index()->unsigned();
            $table->string('nombre', 255);
            $table->string('plan', 30)->default('');
            $table->date('inicio');
            $table->date('final');
            $table->integer('tipocontrato_id')->index()->unsigned();            
            $table->integer('estadocontrato_id')->index()->unsigned();
            $table->double('monto');
            $table->timestamps();
            
            $table->foreign('seguromedico_id')->references('id')->on('seguromedico');
            $table->foreign('tipocontrato_id')->references('id')->on('tipocontrato');
            $table->foreign('estadocontrato_id')->references('id')->on('estadocontrato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contrato');
    }
}
