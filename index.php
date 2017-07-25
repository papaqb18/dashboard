<?php
require('sql.php');

$fecha = date('m-Y');


?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>DASHBOARD SPP-AGO</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="js/bootstrap.js"></script>

	<script>
		function cargaragp()
		{
			var de = "01-<? echo $fecha ?>";
			var hasta = "31-<? echo $fecha ?>";
			$(".boton_spp").hide();
			$(".boton_tkt").hide();
			$(".boton_agp").show();
			$(".expeditivo").hide();
			$(".emergencia").hide();
			
			$(".normal").load('agp.php?var='+de+'&var1='+hasta+'');

 		}
		function cargaragpFecha()
		{
			var hasta = $( ".to" ).val();
			var de = $( ".from" ).val();
			$(".normal").load('agp.php?var='+de+'&var1='+hasta+'');
			
 		}
		
		function cargar()
		{
			var hasta = $( ".to" ).val();
			var de = $( ".from" ).val();
			$(".normal").load('normal.php?var='+de+'&var1='+hasta+'');
			$(".expeditivo").load('expeditivo.php?var='+de+'&var1='+hasta+'');
			$(".emergencia").load('emergencia.php?var='+de+'&var1='+hasta+'');
			$(".expeditivo").show();
			$(".emergencia").show();
		}
		
		function cargarSppSe()
		{
			$(".boton_spp").show();
			$(".boton_tkt").hide();
			$(".boton_agp").hide();
			var de = "01-<? echo $fecha ?>";
			var hasta = "31-<? echo $fecha ?>";
			$(".normal").load('normal.php?var='+de+'&var1='+hasta+'');
			$(".expeditivo").load('expeditivo.php?var='+de+'&var1='+hasta+'');
			$(".emergencia").load('emergencia.php?var='+de+'&var1='+hasta+'');
			$(".expeditivo").show();
			$(".emergencia").show();
		}
		
		function anual()
		{
			$(".boton_tkt").hide();
			$(".boton_agp").hide();
			$(".boton_spp").show();
			$(".expeditivo").show();
			$(".emergencia").show();
			$(".normal").load('sppanualNo.php ');
			$(".expeditivo").load('sppanualExp.php');
			$(".emergencia").load('sppanualEm.php');
			
		}
		function anualAGP()
		{
			
			$(".normal").load('anualAGP.php ');
			$(".expeditivo").hide();
			$(".emergencia").hide();
			$(".boton_spp").hide();
			$(".boton_tkt").hide();
		}
		
		function anualTKT()
		{
			
			$(".normal").load('anualtkt.php ');
			$(".expeditivo").hide();
			$(".emergencia").hide();
			$(".boton_spp").hide();
			$(".boton_tkt").show();
			$(".boton_agp").hide();
		}
		
		
		
	</script>
	
</head>

<body>

<script>
  $( function() {
    var dateFormat = "mm-dd-yy",
      from = $( ".from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( ".to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate1( this ) );
      });
 
    function getDate1( element ) {
      var date;
      try {
        date = $( ".to" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
      } catch( error ) {
        date = null;
      }
 
      return date2;
    }
	function getDate( element ) {
      var date;
      try {
        date = $( ".from" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
      } catch( error ) {
        date = null;
      }
	  return date1;
    }
  } );
  
  
 </script>
<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CENCOSUD</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SPPS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#"  onclick="cargarSppSe()">Mensual</a></li>
                  <li><a href="#" onclick="anual()" >Anual</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TICKETS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Mensual</a></li>
                  <li><a href="#" onclick="anualTKT()">Anual</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AGPS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#" onclick='cargaragp()'>Mensual</a></li>
                  <li><a href="#" onclick='anualAGP()'>Anual</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
<div class="col-sm-12">
  <div class="panel panel-primary">
	<div class="panel-heading">
	<label for="from">De:</label>
<input type="text" class="from" name="from" style="color:#337ab7">
<label for="to">Hasta:</label>
<input type="text" class="to" name="to" style="color:#337ab7">
		<input name="boton" class="boton_spp" onclick="cargar()"  style="color:#337ab7" type="button" value="Buscar" />
		<input name="boton" class="boton_agp" onclick="cargaragpFecha()"  style="color:#337ab7" type="button" value="Buscar" />
		<input name="boton" class="boton_tkt" onclick="cargartktFecha()"  style="color:#337ab7" type="button" value="Buscar" />
</div>
	<div class="panel-body" style="margin-left: auto; margin-right: auto; text-align: center;">
		<div class="normal" ></div>
		<div class="expeditivo"></div>
		<div class="emergencia" ></div>
	</div>
  </div>
</div>
	
	   
</body>
</html>
