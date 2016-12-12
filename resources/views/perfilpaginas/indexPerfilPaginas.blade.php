@extends('layouts.menuAdmin')

@section ('title', 'Perfil Páginas')

@section('content')
  <ol class="breadcrumb">
       <li><a href="{{url('/')}}">Escritorio</a></li>
       <li><a href="{{url('/menu')}}">Menú</a></li>
       <li class="active"> Lista de Perfil de Páginas</a></li>
  </ol>

  <div class="page-header">
    <h1>Perfil de Páginas <small>Actualizados hasta hoy</small></h1>
  </div>

  <div class="row">
    <div class="col-md-12">

     @include('partials.messages')
     <br><br>

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"><span class="glyphicon glyphicon-user"></span> Registrar Perfil de Páginas</button>
            </p>
          </div>
         <div class="panel-body">

            <table class="table table-bordered" id="myTable">
              <thead class="color:red;">
                 {{-- <th>Id</th> --}}
                 <th>Perfil</th>
                 <th>Paginas</th>
                 <th>Tipo de Acceso</th>
                 <th>Descripcion Página</th>
                 <th>Fecha de Creación</th>
                 <th>Fecha de Baja</th>
                 <th>Acción</th>
              </thead>
              <tbody>
               @foreach ($perfil_paginas as $perfilpagina)
                 <tr>
                    {{-- <td>{{$con->id}}</td> --}}
                    <td>{{$perfilpagina->perfil}}</td>
                      <td>{{$perfilpagina->paginas}}</td>
                    <td>{{$perfilpagina->tipo}}</td>
                    <td>{{$perfilpagina->descripcion}}</td>
                    <td>{{$perfilpagina->fechaCreacion}}</td>
                    <td>{{$perfilpagina->fechaBaja}}</td>
                    <td><a href="{{route('perfil_paginas.edit',$perfilpagina->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Perfil de Páginas</a></td>
                 </tr>
               @endforeach

              </tbody>


            </table>
            {{-- <div class="text-center">
              {!!$perfil_paginas->links()!!}
            </div> --}}

         </div>
       </div>


    </div>
  </div>
<script type="text/javascript">
$('#nuevo').click(function(event)
{
  document.location.href="{{route('perfil_paginas.create')}}";
});
$(document).ready(function(){
  $('#myTable').DataTable();
});
</script>

@endsection
