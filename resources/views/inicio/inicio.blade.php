@extends('layouts.menuAdmin')

@section('title','Inicio Sesión')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li class="active">Inicio Sesión</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Inicio Sesion </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Inicio Sesion
          </div>
          <div class="panel-body">


            {!!Form::open(['route'=>'usuaros.inicio','method'=>'POST','name'=>'inicio'])!!}
              {{-- {!!Form::hidden('id',$perfil->id)!!} --}}
	           <div class="form-group">
                  {!!form::label('Nombre')!!}
                  {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del usuario'])!!}
             </div>

                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'] )!!}
                {{-- <a href="{{route('perfiles.index')}}" class="cancelar btn btn-info">Cancelar</a> --}}
          {!!Form::close()!!}
           </div>
        </div>


     </div>
   </div>
  



@endsection
