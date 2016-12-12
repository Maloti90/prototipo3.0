@extends('layouts.menuAdmin')

@section ('title', '')

@section('content')
  <nav class="navbar navbar-default navbar-justified" id="menu">
    <div class="container">
      <ul class="nav navbar-nav botones">
        <li><a href="{{ url('admin/prototipo') }}">Prototipo</a></li>
      </ul>
    </div>
  </nav>
    @yield('content-menuVertical')

@endsection
