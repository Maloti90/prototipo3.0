<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrador:: @yield('title')</title>
    {!!Html::script('js/jquery.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}

    {{-- STYLE --}}
    {!!Html::style('fonts/font-awesome.min.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/jquery.dataTables.min.css')!!}
    {!!Html::style('css/administrador.css')!!}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    {{-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> --}}







@yield('grafico')
  </head>
  <body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <!-- Collapsed Hamburger -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Barra de Navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{url('img/logo.png')}}" alt=""/>
              </a>
            </div>
                <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
            <!-- Authentication Links -- >
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav navbar-left">
                <li><a href="{{ url('/admin') }}" class="active">Administrador APS</a></li>
                <li><a href="{{ url('/admin/bsh') }}">BSH</a></li>
                <li><a href="{{ url('/admin/whirlpool') }}">Whirlpool</a></li>
                <li><a href="{{ url('menu') }}">Menú</a></li>
                <li><a href="{{ url('inicio') }}">inicio Sesión</a></li>
              </ul>
              {{--Nombre del usuario y cierre de sesion --}}
              {{-- <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/logout') }}"><span class="fa fa-btn fa-sign-out"></span>Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul> --}}
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    {{-- SCRIPT --}}

    <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  </body>
</html>
