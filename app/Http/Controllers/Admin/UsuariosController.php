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

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= Usuarios::
        select('usuarios.id','usuarios.nombre','usuarios.apellidos','perfiles.descripcion as perfil','estados.descripcion as estado', 'usuarios.fechaCreacion','usuarios.fechaBaja')
        ->join('perfiles','perfiles.id','=','usuarios.idPerfil')
        ->join('estados','estados.idEstado','=','usuarios.idEstado')->orderBy('usuarios.id')->paginate(5);
        // return $usuarios;
        return view ('usuarios.indexUsuarios')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles= Perfiles::lists('descripcion','id')->prepend('Selecciona un perfil de Usuario');
        $estados= Estados::lists('descripcion','idEstado')->prepend('Selecciona un estado de Usuario');
        return view('usuarios.create')->with('perfiles',$perfiles)->with('estados',$estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosCreateRequest $request)
    {
      Usuarios::create($request->all());
      Session::flash('save', 'Se ha creado correctamente');
      return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $perfiles= Perfiles::lists('descripcion','id');
          $usuarios= Usuarios::FindOrFail($id);
          return view('usuarios.show',array('usuarios'=>$usuarios, 'perfiles'=>$perfiles));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfiles= Perfiles::lists('descripcion','id');
        $estados= Estados::lists('descripcion','idEstado');
        $usuarios=Usuarios::FindOrFail($id);
        return view('usuarios.edit',array('usuarios'=>$usuarios, 'perfiles'=>$perfiles, 'estados'=>$estados));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosUpdateRequest $request, $id)
    {
        $usuarios=Usuarios::FindOrFail($id);
        $input=$request->all();
        $usuarios->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuarios=Usuarios::FindOrFail($id);
      $usuarios->delete();
      Session::flash('delete','Se ha eliminado correctamente');
      return redirect()->route('usuarios.index');
    }
}
