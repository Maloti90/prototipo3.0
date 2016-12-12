<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('sesiones', function(Blueprint $table){
          $table->increments('id',10)->unsigned();
          $table->integer('idUsuario')->unsigned();
          $table->integer('idpagina')->unsigned();
          $table->integer('idOperacion')->unsigned();
          $table->string('descripcion',50);
          $table->string('key',50)->nullable();
          $table->string('fichero',50)->nullable();
          $table->string('datos',50)->nullable();
          $table->datetime('fechaCreacion');
          $table->datetime('fechaBaja')->default('0000-00-00 00:00:00');

          $table->foreign('idUsuario')->references('id')->on('usuarios');
          $table->foreign('idPagina')->references('id')->on('paginas');
          $table->foreign('idOperacion')->references('id')->on('tipo_operaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
