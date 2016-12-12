@extends('layouts.menuAdmin')

@section ('title', 'Perfiles')

@section('content')
  <ol class="breadcrumb">
       <li><a href="{{url('/')}}">Escritorio</a></li>
       <li><a href="{{url('/menu')}}">Menú</a></li>
       <li class="active"> Lista de Perfiles</a></li>
  </ol>

  <div class="page-header">
    <h1>Perfiles <small>Actualizados hasta hoy</small></h1>
  </div>

  <div class="row">
    <div class="col-md-12">

     @include('partials.messages')
     <br><br>

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"><span class="glyphicon glyphicon-user"></span> Registrar Perfil</button>
            </p>
          </div>
         <div class="panel-body">

            <table class="table table-bordered">
              <thead class="color:red;">
                 {{-- <th>Id</th> --}}
                 <th >Tipo de Perfil</th>
                 <th>Fecha Creación</th>
                 <th>Fecha Baja</th>
                 <th>Acción</th>
              </thead>
              <tbody>
               @foreach ($perfiles as $perfil)
                 <tr>
                    {{-- <td>{{$con->id}}</td> --}}
                    <td>{{$perfil->tipo}}</td>
                    <td>{{$perfil->fechaCreacion}}</td>
                    <td>{{$perfil->fechaBaja}}</td>
                    <td><a href="{{route('perfiles.edit',$perfil->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Perfil</a></td>
                 </tr>
               @endforeach

              </tbody>


            </table>
            <div class="text-center">
              {!!$perfiles->links()!!}
            </div>

         </div>
       </div>


    </div>
  </div>
<script type="text/javascript">
$('#nuevo').click(function(event)
{
  document.location.href="{{route('perfiles.create')}}";
});
</script>

@endsection
