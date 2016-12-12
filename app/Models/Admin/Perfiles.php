<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table="perfiles";
    protected $primarykey="id";
    protected $fillable=[
      'id', 'descripcion','fechaCreacion','fechaBaja'];
      public $timestamps=false;
}
