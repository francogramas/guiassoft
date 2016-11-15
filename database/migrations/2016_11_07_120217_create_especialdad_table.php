<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialdadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad', function ($table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->integer('servicios_id')->unsigned()->index();

            $table->foreign('servicios_id')->references('id')->on('servicios');            
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
