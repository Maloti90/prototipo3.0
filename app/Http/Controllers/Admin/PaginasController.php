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

use App\Http\Requests\Paginas\PaginasCreateRequest;
use App\Http\Requests\Paginas\PaginasUpdateRequest;

use Session;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas=Paginas::
        select('paginas.id','paginas.codigo','paginas.descripcion','paginas.conexion','paginas.fechaCreacion','paginas.fechaBaja')->orderBy('paginas.codigo')->get(10);
        return View ('paginas/indexPaginas')->with('paginas',$paginas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaginasCreateRequest $request)
    {
      Paginas::create($request->all());
      Session::flash('save', 'Se ha creado correctamente');
      return redirect()->route('paginas.index');
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
      $paginas=Paginas::FindOrFail($id);
      return view('paginas.edit',array('paginas'=>$paginas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaginasUpdateRequest $request, $id)
    {
      $paginas=Paginas::FindOrFail($id);
      $input=$request->all();
      $paginas->fill($input)->save();
      Session::flash('update','Se ha actualizado correctamente');
      return redirect()->route('paginas.index');
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
