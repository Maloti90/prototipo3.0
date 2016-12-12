@extends('layouts.menuAdmin')

@section('title','Editar Usuario')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/usuarios')}}">Lista de Usuarios</a></li>
  <li class="active">Dar de baja Usuario</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Dar de baja Usuario </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Baja Usuario
          </div>
          <div class="panel-body">


            {!!Form::model($usuarios,['route'=>['usuarios.update',$usuarios->id],'method'=>'PUT','name'=>'nuevoUsuario'])!!}
              {{-- {!!Form::hidden('idUsuario',$usuario->id)!!} --}}
	           <div class="form-group">
                  {!!form::label('Nombre')!!}
                  {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Usuario','readOnly'=>'readOnly'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Apellidos')!!}
                  {!!form::text('apellidos',null,['id'=>'apellidos','class'=>'form-control','placeholder'=>'Apellido del Usuario','readOnly'=>'readOnly'])!!}
             </div>
             <div class="form-group">
                {!!form::label('Perfil')!!}
                {!!Form::select('idPerfil',$perfiles,null,['id'=>'idPerfil','class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                  {!!form::label('Estado')!!} <br>
                    {!!Form::select('idEstado',$estados,null,['id'=>'idEstado','class'=>'form-control']) !!}
             </div>
             <div class="form-group">
                  {!!form::label('Fecha de Creación')!!}
                  {!!Form::text('fechaCreacion',null, ['class'=>'form-control', 'id'=>'fechaCreacion','readOnly'=>'readOnly'])!!}
             </div>
             <div class="form-group">
               {!!form::label('¿Dar de baja?')!!}
               {!!Form::radio('baja','Si',false, ['onclick' => 'cambiarFechaSi()'])!!}Si
               {!!Form::radio('baja','No',false, ['onclick' => 'cambiarFechaNo()'])!!}No
             </div>
             <div class="form-group">
                  {!!form::label('Fecha de Baja')!!}
                  {!!Form::text('fechaBaja',null, ['class'=>'form-control', 'id'=>'fechaBaja','readOnly'=>'readOnly'])!!}
             </div>
                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10','onclick'=>'perdida()' ] )!!}
                 <a href="{{route('usuarios.index')}}" class="cancelar btn btn-info">Cancelar</a>
          {!!Form::close()!!}
           </div>
        </div>


     </div>
   </div>
  <script>
     $("#cancelar").click(function(event)
     {
         document.location.href = "{{ route('usuarios.index')}}";
     });
     function add(i){
      if(i<10){
        i='0'+i;
      }
      return i;
    }
    function cambiarFechaSi()
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
    }
    function cambiarFechaNo()
    {
        document.nuevoUsuario.fechaBaja.value='0000-00-00 00:00:00';
    }
    function perdida()
    {
      var fechaBaja
      fechaBaja=document.nuevoUsuario.fechaBaja;
      var radioNo
      radioNo = document.nuevoUsuario.bajaNo;
    }
  </script>



@endsection
