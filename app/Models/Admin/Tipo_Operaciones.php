<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tipo_Operaciones extends Model
{
  protected $table="tipo_operaiones";
  protected $primarykey="id";
  protected $fillable=[
    'id', 'Descripcion'];
    public $timestamps=false;
}
