<?php

namespace App\Http\Controllers\Admin;

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

use App\Http\Requests\PerfilPaginas\PerfilPaginasCreateRequest;
use App\Http\Requests\PerfilPaginas\PerfilPaginasUpdateRequest;

use Session;
class PerfilPaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil_paginas=Perfil_Paginas::
        select('perfil_paginas.id','perfiles.descripcion as perfil','paginas.codigo','paginas.conexion as paginas','tipo_acceso.descripcion as tipo','perfil_paginas.descripcion','perfil_paginas.fechaCreacion','perfil_paginas.fechaBaja')
        ->join('perfiles','perfiles.id','=','perfil_paginas.idPerfil')
        ->join('paginas','paginas.id','=','perfil_paginas.idPagina')
        ->join('tipo_acceso','tipo_acceso.id','=','perfil_paginas.idTipoAcceso')
        ->orderBy( 'paginas.codigo', 'asc')->get(5);
        return view ('perfilpaginas/indexPerfilPaginas')->with('perfil_paginas',$perfil_paginas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$paginas=Paginas::select('id, descripcion ||','||codigo');
        $perfiles=Perfiles::lists('descripcion','id')->prepend('Seleccione un Perfil de Usuario');
        $paginas=Paginas::lists('conexion','id')->prepend('Seleccione una Página');
        $tipo_acceso=Tipo_Acceso::lists('descripcion','id')->prepend('Seleccione un tipo de acceso');
        return view('perfilpaginas.create')->with('perfiles',$perfiles)->with('paginas',$paginas)->with('tipo_acceso',$tipo_acceso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilPaginasCreateRequest $request)
    {
      Perfil_Paginas::create($request->all());
      Session::flash('save', 'Se ha creado correctamente');
      return redirect()->route('perfil_paginas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $perfiles=Perfiles::lists('descripcion','id');
      $paginas=Paginas::lists('conexion','id');
      $tipo_acceso=Tipo_Acceso::lists('descripcion','id');
      $perfilpaginas=Perfil_Paginas::FindOrFail($id);
      return view('perfilpaginas.edit',array('perfil_paginas'=>$perfilpaginas, 'perfiles'=>$perfiles, 'tipo_acceso'=>$tipo_acceso, 'paginas'=>$paginas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilPaginasUpdateRequest $request, $id)
    {
      $perfilpaginas=Perfil_Paginas::FindOrFail($id);
      $input=$request->all();
      $perfilpaginas->fill($input)->save();
      Session::flash('update','Se ha actualizado correctamente');
      return redirect()->route('perfil_paginas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
