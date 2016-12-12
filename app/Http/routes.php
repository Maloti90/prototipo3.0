<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middlewareGroup' => ['web']], function () {



    // paginas
    route::get('index',['as'=>'inicio','uses'=>'Admin\VistasController@index']);
    route::get('/admin',['as'=>'administrador', 'uses'=>'Admin\VistasController@indexAdministrador']);
    route::get('admin/bsh',['as'=>'bsh', 'uses'=>'Admin\VistasController@indexBSH']);
    route::get('admin/whirlpool',['as'=>'whirlpool', 'uses'=>'Admin\VistasController@indexWhirlpool']);
    route::get('menu',['as'=>'usuarios', 'uses'=>'Admin\VistasController@menu']);
    route::get('api/paginascodigo',function(){
      return Datatables::eloquent(App\Models\Admin\Paginas::query())->make(true);
    });

    // Las vistas
    route::get('admin/prototipo',['as'=>'prototipo', 'uses'=>'Admin\VistasController@prototipo']);
    route::get('admin/prototipo/sensor',['as'=>'sensor', 'uses'=>'Admin\VistasController@sensor']);


    route::get('inicio',['as'=>'inicio','uses'=>'Admin\InicioSesionController@inicio']);






    // crar, editar, select, borrar
      route::resource('usuarios','Admin\UsuariosController');
      route::resource('perfiles','Admin\PerfilesController');
      route::resource('sesiones','Admin\SesionesController');
      // route::resource('paginas','Admin\PaginasController');
      route::resource('paginas','Admin\PaginasController');

      route::resource('perfil_paginas','Admin\PerfilPaginasController');
});
