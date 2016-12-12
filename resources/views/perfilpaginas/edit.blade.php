@extends('layouts.menuAdmin')

@section('title','Editar Usuario')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">Escritorio</a></li>
  <li><a href="{{url('/menu')}}">Menú</a></li>
  <li><a href="{{url('/perfil_paginas')}}">Lista de Perfiles</a></li>
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


            {!!Form::model($perfil_paginas,['route'=>['perfil_paginas.update',$perfil_paginas->id],'method'=>'PUT','name'=>'nuevoPerfilPaginas'])!!}
              {{-- {!!Form::hidden('id',$perfil->id)!!} --}}
              <div class="form-group">
                   {!!form::label('Perfil')!!}
                   {!!Form::select('idPerfil',$perfiles,null,['id'=>'idEstado','class'=>'form-control','readOnly'=>'readOnly', 'disabled']) !!}
              </div>
              <div class="form-group">
                   {!!form::label('Página')!!}
                   {!!Form::select('idPagina',$paginas,null,['id'=>'idEstado','class'=>'form-control','readOnly'=>'readOnly', 'disabled']) !!}
              </div>
              <div class="form-group">
                   {!!form::label('Tipo de Acceso')!!}
                   {!!Form::select('idTipoAcceso',$tipo_acceso,null,['id'=>'idEstado','class'=>'form-control','readOnly'=>'readOnly', 'disabled']) !!}
              </div>
              <div class="form-group">
                   {!!form::label('Descripción de la Página')!!}
                   {!!form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción de la página','readOnly'=>'readOnly'])!!}
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
                 <a href="{{route('perfil_paginas.index')}}" class="cancelar btn btn-info">Cancelar</a>
          {!!Form::close()!!}
           </div>
        </div>


     </div>
   </div>
  <script>
     $("#cancelar").click(function(event)
     {
         document.location.href = "{{ route('perfil_paginas.index')}}";
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
          document.nuevoPerfilPaginas.fechaBaja.value=(tiempo);
    }
    function cambiarFechaNo()
    {
        document.nuevoPerfilPaginas.fechaBaja.value='0000-00-00 00:00:00';
    }
    function perdida()
    {
      var fechaBaja
      fechaBaja=document.nuevoPerfilPaginas.fechaBaja;
      var radioNo
      radioNo = document.nuevoPerfilPaginas.bajaNo;
    }
  </script>



@endsection
