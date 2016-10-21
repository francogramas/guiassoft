<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgruposcie10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('subgruposcie10',
            function($table) {
            $table->increments('id');            
            $table->string('capitulo',3)->index();            
            $table->string('descripcion',255);    
            $table->string('codigo',255); 
            $table->string('descripcion1',255);

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subgruposcie10');
    }
}
