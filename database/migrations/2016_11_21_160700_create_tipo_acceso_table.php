<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAccesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_acceso',function(Blueprint $table){
          $table->increments('id',10)->unsigned();
          $table->char('codigo',10)->unique();
          $table->string('descripcion',50)->unique();
          $table->datetime('fechaCreacion');
          $table->datetime('fechaBaja')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema:drop('tipo_acceso');
    }
}
