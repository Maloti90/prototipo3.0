@extends('administrador.prototipo')

@section ('title', '')
  @php
    $conexion = mysqli_connect("localhost", "root","","sensor" );
  @endphp
@section('grafico')
<script type="text/javascript">
  document.cookie="fecha=''"; $(document).ready(function(){
    $("#mandar").click(function()
    {
      var fechas = $('input[name=fecha]').val();
      document.cookie="fecha='"+fechas+"';";
        // alert(fechas)
      location.reload(true);
    })
  })

  @php
  if(!isset($_COOKIE['fecha']) || $_COOKIE['fecha']=="undefined")
  {
    $fechaPhp="";
  }
  else
  {
    $fechaPhp=" and fecha=";
    $fechaPhp= $fechaPhp . $_COOKIE['fecha'];
  }
  @endphp

  $(document).ready(function (){ $('#container').highcharts({
    chart:
    {
        zoomType:'xy'
    },
    title:
    {
        text:"SENSOR",
        x: 0 //center
    },
    xAxis:
    {
      categories:
      [
        @php
          $sql = "SELECT * FROM temperaturas WHERE valor BETWEEN 10 and 30 $fechaPhp";
          $result = mysqli_query($conexion, $sql);
          while ($valores = mysqli_fetch_array($result))
          {
        @endphp
            '@php echo  'ID: '.$valores['codigo']. '/'. 'Hora: ' .$valores["hora"]@endphp',
        @php
          }
        @endphp
      ],
      tickInterval: 0,
    },
    yAxis:
    {
      title:
      {
        text: ''
      },
      plotLines:
      [{
        value: 0,
        width: 1,
        color: '#808080'
      }],
    },
    tooltip:
    {
      valueSuffix: 'ºC'
    },
    legend:
    {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
    },
    series:
    [
      {
        name: 'Temp',
        data:
        [
          @php
            $sql = "SELECT * FROM temperaturas WHERE valor BETWEEN 10 and 30 $fechaPhp";
            $result = mysqli_query($conexion, $sql);
            while ($valores = mysqli_fetch_array($result))
            {
          @endphp
              @php echo $valores["valor"] @endphp,
          @php
            }
          @endphp
        ]
      },
      {
        name: 'Media',
        data:
        [
          @php
            $sql = "SELECT AVG(valor) FROM temperaturas  WHERE valor BETWEEN 10 and 30 $fechaPhp";
            $result = mysqli_query($conexion, $sql);
            $valores = mysqli_fetch_array($result)
          @endphp
          @php echo $valores["AVG(valor)"] @endphp
        ]
      }
    ]
  });
});
</script>
@endsection

@section('content-principal')
  <div class="clearfix visible-sm-block"></div>
  <div class="contenidoPrincipal">
    {{-- <h4 style="text-align:center"> Seleccione una fecha</h4> --}}
    <form style="text-align:center;" name="form1" id="formu1" action="" method="post" >
      @php
          if(!isset($_COOKIE['fecha']) || $_COOKIE['fecha']=="'undefined'")
         {
             $escribirPhp="Selecciona una fecha";
         }
         elseif ($_COOKIE['fecha']=='')
         {
           $escribirPhp="Debes seleccionar una fecha ";
         }
         else
         {
             $escribirPhp="La fecha de la gráfica que se muestra es ".$_COOKIE['fecha']."\n";
         }
          echo "<h3>$escribirPhp.</h3>";
      @endphp
      <br>
      <div class="fechasASeleccion" style="width:50%; height: auto; margin:0 auto; overflow:auto;">
        <input type="date" name="fecha" class="fecha" min="2016-06-20">
        <input type="button" class="manda" id="mandar" name="envio" Value="mostrar">
      </div>
      <script>
      document.cookie="fecha='undefined'";
      </script>
      {{-- <input type="button" class="manda" id="mandar" name="envio" value="mostrar" > --}}
    </form>
    <br><br><br>
    <div id="container" style="width: 70%; height: auto; margin: 0 auto; overflow:auto;"></div>
  </div>
@endsection
