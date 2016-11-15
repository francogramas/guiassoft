<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariopersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horariopersonal',
            function($table) {
            $table->increments('id');
            $table->integer('empleados_id')->index()->unsigned();
            $table->time('horai');
            $table->time('horaf');
            $table->integer('intervalo')->unsigned();

            $table->timestamps();
            $table->foreign('empleados_id')->references('id')->on('empleados');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('horariopersonal');
    }
}
