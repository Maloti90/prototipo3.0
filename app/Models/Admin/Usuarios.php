<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table="usuarios";
    protected $primarykey="id";
    protected $fillable=[
      'id', 'nombre', 'apellidos','idPerfil','idEstado','clave','fechaCreacion','fechaBaja'];
      public $timestamps=false;
}
