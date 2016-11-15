<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupsespecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupsespecialidad', function ($table) {
            $table->increments('id');
            $table->integer('especialidad_id')->unsigned()->index();
            $table->string('cups_codigo',7)->index();

            $table->timestamps();
            $table->foreign('especialidad_id')->references('id')->on('especialidad');
            $table->foreign('cups_codigo')->references('codigo')->on('cups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cupsespecialidad');
    }
}
