@extends('layouts.menuAdmin')

@section('title','Editar Usuario')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/perfiles')}}">Lista de Perfiles</a></li>
  <li class="active">Editar Perfil</li>
   </ol>
<div>
@include('partials.messages')
</div>


   <div class="page-header">
     <h1>Editar Perfil</h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Editar Perfil
          </div>
          <div class="panel-body">


            {!!Form::model($perfiles,['route'=>['perfiles.update',$perfiles->id],'method'=>'PUT','name'=>'nuevoPerfil'])!!}
              {{-- {!!Form::hidden('id',$perfil->id)!!} --}}
	           <div class="form-group">
                  {!!form::label('Tipo de Perfil')!!}
                  {!!form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','readOnly'=>'readOnly'])!!}
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
                 <a href="{{route('perfiles.index')}}" class="cancelar btn btn-info">Cancelar</a>
          {!!Form::close()!!}
           </div>
        </div>


     </div>
   </div>
  <script>
     $("#cancelar").click(function(event)
     {
         document.location.href = "{{ route('perfiles.index')}}";
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
          document.nuevoPerfil.fechaBaja.value=(tiempo);
    }
    function cambiarFechaNo()
    {
        document.nuevoPerfil.fechaBaja.value='0000-00-00 00:00:00';
    }
    function perdida()
    {
      var fechaBaja
      fechaBaja=document.nuevoPerfil.fechaBaja;
      var radioNo
      radioNo = document.nuevoPerfil.bajaNo;
    }
  </script>



@endsection
