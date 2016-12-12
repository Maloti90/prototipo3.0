@extends('layouts.menuAdmin')

@section ('title', 'Usuarios')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <br>
    <br>
    <a href="/usuarios" class="btn btn-lg btn-block btn-warning"><span class="glyphicon glyphicon-user"></span> USUARIOS</a>
    <br>
    <a href="/perfiles" class="btn btn-lg btn-block btn-success"><span class="glyphicon glyphicon-list-alt"></span> PERFILES</a>
    <br>
    <a href="/perfil_paginas" class="btn btn-md btn-block btn-success" ><span class="glyphicon glyphicon-list-alt"></span> PERFILES PÁGINAS</a>
<br>
    <a href="/sesiones" class="btn btn-lg btn-block btn-primary"><span class="glyphicon glyphicon-eye-open"></span> SESIONES</a>
    <br>
    <a href="/paginas" class="btn btn-lg btn-block btn-info"><span class="glyphicon glyphicon-duplicate"></span> PÁGINAS</a>
  </div>
</div>


@endsection
