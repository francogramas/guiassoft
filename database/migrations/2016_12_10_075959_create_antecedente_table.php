<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('antecedenteclase_id')->index()->unsigned();
            $table->string('nombre',255);            

            $table->foreign('antecedenteclase_id')->references('id')->on('antecedenteclase');
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
        Schema::drop('antecedente');
    }
}
