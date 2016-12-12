@extends('layouts.menuAdmin')

@section('title','Nuevo Perfil')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/perfiles')}}">Lista de Perfiles</a></li>
  <li class="active">Nuevo Perfil</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Perfil Nuevo </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Nuevo Perfil
          </div>
          <div class="panel-body">


            {!!Form::open(['route'=>'perfiles.store','method'=>'POST','name'=>'nuevoPerfil'])!!}
              {{-- {!!Form::hidden('id',$perfil->id)!!} --}}
	           <div class="form-group">
                  {!!form::label('Tipo de Perfil')!!}
                  {!!form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Nombre del Perfil'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Fecha de Creación')!!}
                  {!!Form::text('fechaCreacion',null, ['class'=>'form-control', 'id'=>'fechaCreacion','readOnly'=>'readOnly'])!!}
             </div>

                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'] )!!}
                <a href="{{route('perfiles.index')}}" class="cancelar btn btn-info">Cancelar</a>
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
      document.nuevoPerfil.fechaCreacion.value=(tiempo);
    })
  </script>



@endsection
