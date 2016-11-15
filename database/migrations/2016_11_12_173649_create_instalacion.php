<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstalacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('instalacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->integer('cupo');            
            $table->integer('inst_tipo_id')->index()->unsigned();
            $table->timestamps();

            $table->foreign('inst_tipo_id')->references('id')->on('inst_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instalacion');
    }
}
