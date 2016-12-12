@extends('layouts.menuAdmin')

@section('title','Nuevo Usuario')

@section('content')

<ol class="breadcrumb">
    <li><a href="{{url('/')}}">Escritorio</a></li>
    <li><a href="{{url('/menu')}}">Menú</a></li>
    <li><a href="{{url('usuarios')}}"></a> Lista de Usuarios</a></li>
    <li class="active">Eliminar Usuario</li>
   </ol>
<div>
{{-- @include('partials.messages') --}}
</div>


   <div class="page-header">
     <h1>Eliminar Usuarios </h1>
   </div>

   <div class="row">
     <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
             Eliminar Usuarios
          </div>
          <div class="panel-body">
            {!!Form::open(['route'=>['usuarios.destroy',$usuarios->id],'method'=>'DELETE'])!!}
            <div class="form-group">
              {!!Form::label('¿DESEAS ELIMINAR ESTE REGISTRO?')!!}
            </div>
            <div class="form-group">
              {!!Form::label('Nombre')!!}
              {!!$usuarios->nombre!!}<br>
              {!!Form::label('Apellidos')!!}
              {!!$usuarios->apellidos!!}<br>
            </div>
            {!!form::submit('Eliminar',['name'=>'eliminar', 'id'=>'eliminar','content'=>' Eliminar','class'=>'btn btn-danger btn-sm m-t-10'])!!}
             <a href="{{route('usuarios.index')}}" class="cancelar btn btn-info">Cancelar</a>
             {!!Form::close()!!}
          </div>
        </div>


     </div>
   </div>
  {{-- <script>
     function add(i){
      if(i<10){
        i='0'+i;
      }
      return i;
    }
    $(document).ready(function()
    {
      var fecha= new Date();
      var year =fecha.getFullYear();
      var month = fecha.getMonth()+1;
      var day = fecha.getDate();
      var hours = add(fecha.getHours());
      var minutes=add(fecha.getMinutes());
      var seconds = add(fecha.getSeconds());
      var tiempo=(year+'-'+month+'-'+day+' '+hours+':'+minutes+':'+seconds)
      document.nuevoUsuario.fechaBaja.value=(tiempo);
    })
  </script> --}}



@endsection
