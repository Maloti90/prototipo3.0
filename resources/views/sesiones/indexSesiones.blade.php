@extends('layouts.menuAdmin')

@section ('title', 'Sesiones')

@section('content')
  <ol class="breadcrumb">
       <li><a href="{{url('/')}}">Escritorio</a></li>
       <li><a href="{{url('/menu')}}">Menú</a></li>
       <li class="active"> Lista de Sesiones</a></li>
  </ol>

  <div class="page-header">
    <h1>Sesiones <small>Actualizados hasta hoy</small></h1>
  </div>

  <div class="row">
    <div class="col-md-12">

     @include('partials.messages')
     <br><br>

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               {{-- <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"><span class="glyphicon glyphicon-user"></span> Registrar</button> --}}
            </p>
          </div>
         <div class="panel-body">

            <table class="table table-bordered" id="myTable">
              <thead class="color:red;">
                 {{-- <th>Id</th> --}}
                 <th >Usuario</th>
                 <th>Página</th>
                 <th>Operacion</th>
                 <th>Descripción</th>
                 <th>Fecha de Creación</th>
              </thead>
              <tbody>
               @foreach ($sesiones as $sesion)
                 <tr>
                    {{-- <td>{{$con->id}}</td> --}}
                    <td>{{$sesion->usuario}}</td>
                    <td>{{$sesion->paginas}}</td>
                    <td>{{$sesion->descripcion}}</td>
                    <td>{{$sesion->fechaCreacion}}</td>


                 </tr>
               @endforeach

              </tbody>


            </table>
            {{-- <div class="text-center">
              {!!$perfiles->links()!!}
            </div> --}}

         </div>
       </div>


    </div>
  </div>
<script type="text/javascript">
$('#nuevo').click(function(event)
{
  document.location.href="{{route('sesiones.create')}}";
});
$(document).ready(function(){
  $('#myTable').DataTable();
});
</script>

@endsection
