<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentoPaciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TipoDocumentoPaci',
            function($table) {
            $table->increments('id');
            $table->string('cod', 2);
            $table->string('descripcion', 255);
            $table->integer('edad');            
        });
    }


    public function down()
    {
        Schema::drop('TipoDocumentoPaci');
    }
}
