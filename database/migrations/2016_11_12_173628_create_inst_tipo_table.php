<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_tipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->integer('inst_servicio_id')->index()->unsigned();

            $table->foreign('inst_servicio_id')->references('id')->on('inst_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inst_tipo');
    }
}
