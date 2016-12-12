@extends('administrador.indexAdministrador')

@section ('title', '')
{{-- @section('img')
@endsection --}}
@section('content-menuVertical')

<script type="text/javascript">
  ALERT('HOLA')
</script>
  <div class="subMenuVertical">
    <ul>
      <li><a href="{{url('admin/prototipo/sensor')}}" onclick="fondo()">Sensor</a></li>

    </ul>
  </div>

<script type="text/javascript">
  function fondo()
  {
      document.getElementsByClassName('imagen').style.backgroundColor="#222222";
  }
</script>

  <div class="imagen"style="background:url('../img/desbobinadora.png') no-repeat; width: auto; height: 700px;   background-position: center top; position: fixed;
  width: 79%;
  left: 15%;
  margin: 1%;
  top: 20%;">

  </div>
    @yield('content-principal')
  <div class="clearfix visible-sm-block"></div>
@endsection
