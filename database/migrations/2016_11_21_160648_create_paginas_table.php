<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function(Blueprint $table){
          $table ->increments('id',10)->unsigned();
          $table ->integer('codigo',10)->unsigned()->unique();
          $table ->string('descripcion',50)->unique();
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
        Schema:drop('paginas');
    }
}
