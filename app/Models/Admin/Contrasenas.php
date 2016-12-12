<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Contrasenas extends Model
{
  protected $table="contrasenas";
  protected $primarykey="id";
  protected $fillable=[
    'id', 'idUsuario', 'clave','fechaCreacion','fechaBaja'];
    public $timestamps=false;
}
