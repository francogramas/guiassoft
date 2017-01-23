<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapashcespecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapashcespecialidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etapashc_id')->index()->unsigned();
            $table->integer('cupsespecialidad_id')->index()->unsigned();
            $table->integer('orden')->default('0');

            $table->foreign('etapashc_id')->references('id')->on('etapashc');
            $table->foreign('cupsespecialidad_id')->references('id')->on('cupsespecialidad');
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
        Schema::drop('etapashcespecialidad');
    }
}
