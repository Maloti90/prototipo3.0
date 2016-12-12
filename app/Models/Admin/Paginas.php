<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paginas extends Model
{
  protected $table="paginas";
  protected $primarykey="id";
  public $timestamps=false;
  protected $fillable=[
    'id', 'codigo','descripcion','fechaCreacion','fechaBaja'];

}
