<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Usuarios;
use App\Models\Admin\Perfiles;
use App\Models\Admin\Contraseñas;
use App\Models\Admin\Paginas;
use App\Models\Admin\Perfil_Paginas;
use App\Models\Admin\Sesiones;
use App\Models\Admin\Tipo_Acceso;
use App\Models\Admin\Tipo_Operaciones;

use App\Http\Requests\Perfil\PerfilCreateRequest;
use App\Http\Requests\Perfil\PerfilUpdateRequest;

use Session;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles=Perfiles::
        select('perfiles.id','perfiles.descripcion as tipo', 'perfiles.fechaCreacion','perfiles.fechaBaja')->orderBy('perfiles.id')->paginate(5);
        return view ('perfiles/indexPerfiles')->with('perfiles',$perfiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilCreateRequest $request)
    {
      Perfiles::create($request->all());
      Session::flash('save', 'Se ha creado correctamente');
      return redirect()->route('perfiles.index');
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

      $perfiles=Perfiles::FindOrFail($id);
      return view('perfiles.edit',array('perfiles'=>$perfiles));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilUpdateRequest $request, $id)
    {
      $perfiles=Perfiles::FindOrFail($id);
      $input=$request->all();
      $perfiles->fill($input)->save();
      Session::flash('update','Se ha actualizado correctamente');
      return redirect()->route('perfiles.index');
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
