<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilPaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('perfil_paginas', function(Blueprint $table){
          $table->increments('id',10)->unsigned();
          $table->integer('idPerfil')->unsigned();
          $table->integer('idPagina')->unsigned();
          $table->integer('idTipoAcceso')->unsigned();
          $table->string('descripcion',50);
          $table->datetime('fechaCreacion');
          $table->datetime('fechaBaja')->default('0000-00-00 00:00:00');

          $table->foreign('idPerfil')->references('id')->on('perfiles');
          $table->foreign('idPagina')->references('id')->on('paginas');
          $table->foreign('idTipoAcceso')->references('id')->on('tipo_acceso');
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
