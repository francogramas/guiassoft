<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios',
         function ($table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->integer('ambitoprocedimiento_id')->unsigned()->index();

            $table->foreign('ambitoprocedimiento_id')->references('id')->on('Ambitoprocedimiento');
        });
    }

    /**
     * Reverse the migrations.
     *  
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
