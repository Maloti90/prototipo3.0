<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table="estados";
    protected $primarykey="idEstado";
    protected $fillable=[
      'idEstado', 'descripcion','fechaCreacion','fechaBaja'];
      public $timestamps=false;
}
