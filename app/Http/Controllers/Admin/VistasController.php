<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Http\Models\Admin\Usuarios;
use Session;

class VistasController extends Controller
{
  public function index()
  {
    return View('administrador/index');
  }
  public function indexAdministrador()
  {
    return View('administrador/indexAdministrador');
  }
  public function sensor()
  {
    return View('administrador/sensor');
  }
  public function prototipo()
  {
    return View('administrador/prototipo');
  }
  public function indexBSH()
  {
    return View('administrador/indexBSH');
  }
  public function indexWhirlpool ()
  {
    return View('administrador/indexWhirlpool');
  }
  public function menu()
  {
    return View ('administrador/menu');
  }
}
