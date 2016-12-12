@extends('layouts.menuAdmin')

@section ('title', 'Usuarios')

@section('content')
  <ol class="breadcrumb">
       <li><a href="{{url('/')}}">Escritorio</a></li>
       <li><a href="{{url('/menu')}}">Menú</a></li>
       <li class="active"> Lista de Usuarios</a></li>
  </ol>

  <div class="page-header">
    <h1>Usuarios <small>Actualizados hasta hoy</small></h1>
  </div>

  <div class="row">
    <div class="col-md-12">

     @include('partials.messages')
     <br><br>

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</button>
            </p>
          </div>
         <div class="panel-body">

            <table class="table table-bordered" id="myTable">
              <thead class="color:red;">
                 {{-- <th>Id</th> --}}
                 <th >Nombre</th>
                 <th >Apellidos</th>
                 <th >Perfil</th>
                 <th>Estado</th>
                 <th>Fecha Creación</th>
                 <th>Fecha Baja</th>
                 <th>Acciones</th>
              </thead>
              <tbody>
               @foreach ($usuarios as $usuario)
                 <tr>
                    {{-- <td>{{$con->id}}</td> --}}
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{$usuario->perfil}}</td>
                    <td>{{$usuario->estado}}</td>
                    <td>{{$usuario->fechaCreacion}}</td>
                    <td>{{$usuario->fechaBaja}}</td>
                    <td>
                      <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Dar de Baja Usuario</a>
                      {{-- <a href="{{route('usuarios.show',$usuario->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a> --}}
                    </td>
                 </tr>
               @endforeach

              </tbody>


            </table>
            <div class="text-center">
              {!!$usuarios->links()!!}
            </div>

         </div>
       </div>


    </div>
  </div>
<script type="text/javascript">
$('#nuevo').click(function(event)
{
  document.location.href="{{route('usuarios.create')}}";
});
$(document).ready(function(){
  $('#myTable').DataTable();
});
</script>

@endsection
