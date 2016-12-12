<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('usuarios', function(Blueprint $table){
          $table->increments('id')->unsigned();
          $table->string('nombre',50);
          $table->string('apellidos',50);
          $table->integer('idPerfil')->unsigned();
          $table->enum('estado',['Conectado','Desconectado']);
          $table->string('clave',255);
          $table->datetime('fechaCreacion');
          $table->datetime('fechaBaja')->default('0000-00-00 00:00:00');

          $table->foreign('idPerfil')->references('id')->on('perfiles');
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
