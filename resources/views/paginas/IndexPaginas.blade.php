@extends('layouts.menuAdmin')

@section ('title', 'Páginas')

@section('content')

  <ol class="breadcrumb">
       <li><a href="{{url('/')}}">Escritorio</a></li>
       <li><a href="{{url('/menu')}}">Menú</a></li>
       <li class="active"> Lista de Páginas</a></li>
  </ol>

  <div class="page-header">
    <h1>Páginas <small>Actualizados hasta hoy</small></h1>
  </div>

  <div class="row">
    <div class="col-md-12">

     @include('partials.messages')
     <br><br>

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"><span class="glyphicon glyphicon-user"></span> Registrar Páginas</button>
            </p>
          </div>
         <div class="panel-body">

            <table class="table table-bordered" id="myTable">
              <thead class="color:red;">
                 {{-- <th>Id</th> --}}
                 <th>Código</th>
                 <th>Descripción</th>
                 <th>Código=>Descripción</th>
                 <th>Fecha de Creación</th>
                 <th>Fecha de Baja</th>
                 <th>Acción</th>
              </thead>
              <tbody>
               @foreach ($paginas as $pagina)
                 <tr>
                    {{-- <td>{{$pagina->id}}</td> --}}
                    <td>{{$pagina->codigo}}</td>
                    <td>{{$pagina->descripcion}}</td>
                    <td>{{$pagina->conexion}}</td>
                    <td>{{$pagina->fechaCreacion}}</td>
                    <td>{{$pagina->fechaBaja}}</td>
                    <td><a href="{{route('paginas.edit',$pagina->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Páginas</a></td>

                 </tr>
               @endforeach

              </tbody>


            </table>
            {{-- <div class="text-center">
              {!!$paginas->links()!!}
            </div> --}}

         </div>
       </div>


    </div>
  </div>

<script type="text/javascript">
$('#nuevo').click(function(event)
{
  document.location.href="{{route('paginas.create')}}";
});
$(document).ready(function(){
  $('#myTable').DataTable();
});
// $(document).ready(function(){
//   $('#myTable').DataTable({
//     "processing": true,
//     "serverSide": true,
//     "ajax": "api/paginascodigo",
//     "columns":[
//       {data:'id'},
//       {data:'codigo'},
//       {data:'descripcion'},
//       {data:'fechaCreacion'},
//       {data:'fechaBaja'},
//
//     ]
//   });
// });
</script>

@endsection
