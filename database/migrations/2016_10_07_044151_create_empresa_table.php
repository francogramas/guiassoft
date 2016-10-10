
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('empresa',
            function($table) {
            $table->increments('id');
            $table->string('nombre', 60);
            $table->integer('tipodocumento_id')->unsigned()->index();
            $table->string('documento',20);
            $table->integer('ciudad_id')->unsigned()->index();
            $table->string('telefono',20);
            $table->string('correo',30);
            $table->string('direccion',255);
            $table->string('codigo_habilitacion',12);
            $table->timestamps();
            
            $table->foreign('tipodocumento_id')->references('id')->on('tipodocumento');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresa');
    }
}
