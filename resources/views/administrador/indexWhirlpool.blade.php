@extends('layouts.menuAdmin')

@section ('title', '')

@section('content')
  <nav class="navbar navbar-default navbar-justified" id="menu">
    <div class="container">
      <ul class="nav navbar-nav botones">
        <li><a href="{{ url('#') }}"></a></li>
      </ul>
    </div>
  </nav>
    @yield('content-menuVertical')
    <div class="algo">
      <center>
        <h3 class="text-danger">No hay nada programado</h3>
      </center>
    </div>
@endsection
