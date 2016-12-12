<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipo_Acceso extends Model
{
  protected $table="tipo_acceso";
  protected $primarykey="id";
  protected $fillable=[
    'id', 'codigo', 'descripcion','fechaCreacion','fechaBaja'];
    public $timestamps=false;
}
