<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemshcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemshc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etapashcespecialidad_id')->index()->unsigned();
            $table->string('nombre',255);
            $table->string('sugerencia',255);
            $table->integer('orden')->default('0');
            $table->string('type');
            
            $table->foreign('etapashcespecialidad_id')->references('id')->on('etapashcespecialidad');
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
        Schema::drop('itemshc');
    }
}
