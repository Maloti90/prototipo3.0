<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
  protected $table="sesiones";
  protected $primarykey="id";
  protected $fillable=[
    'id', 'idUsuario', 'idPagina', 'tipoOperacion', 'descripcion', 'key', 'fichero', 'datos', 'fechaCreacion'];
    public $timestamps=false;
    
}
