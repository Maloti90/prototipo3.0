<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Usuarios;
use App\Models\Admin\Perfiles;
use App\Models\Admin\Estados;
use App\Models\Admin\Contrasenas;
use App\Models\Admin\Paginas;
use App\Models\Admin\Perfil_Paginas;
use App\Models\Admin\Sesiones;
use App\Models\Admin\Tipo_Acceso;
use App\Models\Admin\Tipo_Operaciones;

use App\Http\Requests\Usuarios\UsuariosCreateRequest;
use App\Http\Requests\Usuarios\UsuariosUpdateRequest;

use Session;

class InicioSesionController extends Controller
{
    public function inicio(Request $request)
    {
      $input=$request->nombre;
      $usuarios=Usuarios::select('usuarios.nombre')->where('usuarios.nombre','=',$input);
      Session::flash('inicio','nombre Correcto');
      return view ('inicio.inicio')->with('usuarios',$usuarios);
    }
}
