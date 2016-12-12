@extends('layouts.menuAdmin')

@section('title','Nuevo Usuario')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/usuarios')}}">Lista de Usuarios</a></li>
  <li class="active">Nuevo Usuario</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Usuario Nuevo </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Nuevo Usuarios
          </div>
          <div class="panel-body">


            {!!Form::open(['route'=>'usuarios.store','method'=>'POST','name'=>'nuevoUsuario'])!!}
              {{-- {!!Form::hidden('idUsuario',$usuario->id)!!} --}}
	           <div class="form-group">
                  {!!form::label('Nombre')!!}
                  {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Usuario'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Apellidos')!!}
                  {!!form::text('apellidos',null,['id'=>'apellidos','class'=>'form-control','placeholder'=>'Apellido del Usuario'])!!}
             </div>
             <div class="form-group">
                {!!form::label('Perfil')!!}
                {!!Form::select('idPerfil',$perfiles,null,['id'=>'idPerfil','class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                  {!!form::label('Estado')!!}
                  {!!Form::select('idEstado',$estados,null,['id'=>'idEstado','class'=>'form-control']) !!}
             </div>
             <div class="form-group">
                  {!!form::label('Contraseña')!!}
                  {!!form::password('clave',null,['id'=>'clave','class'=>'form-control clave','placeholder'=>'Contraseña' ])!!}
                  {!!form::label('Repetir Contraseña')!!}
                  {!!form::password('clave_confirmation',null,['id'=>'clave_confirmation','class'=>'form-control clave_confirmation','placeholder'=>'Repetir Contraseña'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Fecha de Creación')!!}
                  {!!Form::text('fechaCreacion',null, ['class'=>'form-control', 'id'=>'fechaCreacion','readOnly'=>'readOnly'])!!}
             </div>

                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'] )!!}
                <a href="{{route('usuarios.index')}}" class="cancelar btn btn-info">Cancelar</a>
          {!!Form::close()!!}
           </div>
        </div>


     </div>
   </div>
  <script>
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
      document.nuevoUsuario.fechaCreacion.value=(tiempo);
    })
  </script>



@endsection
