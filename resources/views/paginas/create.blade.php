@extends('layouts.menuAdmin')

@section('title','Nuevo Perfil')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/paginas')}}">Lista de Páginas</a></li>
  <li class="active">Nuevo Páginas</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Páginas Nuevo </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Nuevo Páginas
          </div>
          <div class="panel-body">


            {!!Form::open(['route'=>'paginas.store','method'=>'POST','name'=>'nuevoPaginas'])!!}
              {{-- {!!Form::hidden('id',$perfil->id)!!} --}}
              <div class="alert alert-info" role='alert'>
                <strong>INFORMACIÓN:</strong>
                <ul>
                  <li>1º Numero: menú superior.</li>
                  <li>2º y 3º Numero: Sub menú del menú superiro.</li>
                  <li>4º y 5º Numero: Acciones del sub menú.</li>
                  <li><small>EJEMPLO: 1 INICIO, 101 INICIO/SALUDO, 10101 INICIO/SALUDO/REGISTRO</small></li>
                </ul>
              </div>
	           <div class="form-group">
                  {!!form::label('Código')!!}
                  {!!form::text('codigo',null,['id'=>'codigo','class'=>'form-control','placeholder'=>'Nombre del Perfil'])!!}
             </div>
             <div class="alert alert-info" role='alert'>
               <strong>INFORMACIÓN:</strong>
               <ul>
                 <li>En descripción solo escribir la última acción</li>
                 <li><small>Ejemplo: 1 Inicio, 101 Saludo, 10101 Resgistrar</small></li>
               </ul>
             </div>
             <div class="form-group">
                  {!!form::label('Descripción')!!}
                  {!!form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Nombre del Perfil'])!!}
             </div>
             <div class="alert alert-info" role='alert'>
               <strong>INFORMACIÓN:</strong>
               <ul>
                 <li>Introduzca el <strong>código</strong> y la <strong>Descripción</strong> sin espacios y separados por <strong>=></strong></li>
               </ul>
             </div>
             <div class="form-group">
                  {!!form::label('Conexion de los campos')!!}
                  {!!form::text('conexion',null,['id'=>'conexion','class'=>'form-control','placeholder'=>'codigo=>descripcion'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Fecha de Creación')!!}
                  {!!Form::text('fechaCreacion',null, ['class'=>'form-control', 'id'=>'fechaCreacion','readOnly'=>'readOnly'])!!}
             </div>

                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'] )!!}
                <a href="{{route('paginas.index')}}" class="cancelar btn btn-info">Cancelar</a>
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
      document.nuevoPaginas.fechaCreacion.value=(tiempo);
    })
  </script>



@endsection
