<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Perfil_Paginas extends Model
{
  protected $table="perfil_paginas";
  protected $primarykey="id";
  protected $fillable=[
    'id', 'idPerfil', 'idPagina','idTipoAcceso','Descripcion','fechaCreacion','fechaBaja'];
    public $timestamps=false;
}
