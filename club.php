<?php require_once("conn/connect.php"); ?>

<?php 
	$id="";
	if (isset($_GET["id"])){
		$id = $_GET["id"];
	}

//CLUB INFO
$consulta="SELECT * FROM club WHERE club.club_id = '$id'";
$resultado = $connect ->query($consulta);
$fila = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);

 //IMAGENES club
$consulta_imagen="SELECT imagen.imagen_id, imagen.imagen FROM club INNER JOIN club_imagen ON club_imagen.club_id = club.club_id INNER JOIN imagen ON club_imagen.imagen_id = imagen.imagen_id  WHERE club.club_id = '$id'";
$resultado_imagen = $connect ->query($consulta_imagen);
$fila_imagen = mysqli_fetch_assoc($resultado_imagen);
$total_imagen = mysqli_num_rows($resultado_imagen);

//ACTIVIDAD Barrio 
$consulta_barrio="SELECT barrio.barrio FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id WHERE club.club_id = '$id'";
$resultado_barrio = $connect ->query($consulta_barrio);
$fila_barrio = mysqli_fetch_assoc($resultado_barrio);
$total_barrio = mysqli_num_rows($resultado_barrio);


//ACTIVIDAD club 
$consulta_actividad="SELECT actividad.actividad_id, actividad.actividad FROM club INNER JOIN club_actividad ON club_actividad.club_id = club.club_id  INNER JOIN actividad ON club_actividad.actividad_id = actividad.actividad_id  WHERE club.club_id = '$id' ORDER BY actividad ASC";
$resultado_actividad = $connect ->query($consulta_actividad);
$fila_actividad= mysqli_fetch_assoc($resultado_actividad);
$total_actividad = mysqli_num_rows($resultado_actividad);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ClubesCABA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="boot/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link rel="shortcut icon" href="img/icono.ico" type="image/ico"/>	
	<script type="text/javascript" src= "js/jquery.js"></script>
	<script type="text/javascript" src="boot/js/bootstrap.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"> </script>
	<script type="text/javascript" src= "js/ajax.js"></script>
</head>
<body>
<header>
	<img src="data:image/jpg;base64, <?php echo base64_encode($fila["escudo"]);?>">
	<h1 class="tit"><?php echo utf8_encode($fila["nombre"])?></h1>
</header>
<table class="table">
	<meta charset="utf-8">
	<td>Barrio de <?php echo utf8_encode($fila_barrio["barrio"]) ?></td>
	<td><a class="web"href="<?php echo utf8_encode($fila["pagina_web"])?>" target="_blank"> Pagina Web (click aqui!)</a></td>
		<td>Telefono <?php echo utf8_encode($fila["telefono"]) ?></td>
		<td><?php echo utf8_encode($fila["mail"]) ?></td>
</table>

<!-- GALERIA -->
<div class="main">
	<div class="slides">
		<?php do { ?>
			<img src="data:image/jpg;base64, <?php echo base64_encode($fila_imagen["imagen"]);?>">	
		<?php } while($fila_imagen=mysqli_fetch_assoc($resultado_imagen));?>	
	</div>
</div>
<script src= "js/jquery.js"></script>
<script src="js/jquery.slides.js"></script>
<script>
	$(function(){
		$('.slides').slidesjs({
    		navigation: {
		    	active:false,
		    }

		});
	});
</script>
	
	<div class="acts">
		<h3>Actividades Principales</h3>
		<hr>
			<div class="actividades">
			<table class="t">
				<?php do { ?>
						<td class="tividades"><?php echo utf8_encode($fila_actividad["actividad"])?></td>
				<?php } while($fila_actividad=mysqli_fetch_assoc($resultado_actividad));?>
			</table>
			</div>
	</div>

<div class="lo">
<div id="map" style="width:95%;height:400px;margin: auto; padding-top:20px; background: #fff;">	  
</div>
			<script>
			function myMap() {
			  var mapCanvas = document.getElementById("map");
			  var myCenter = new google.maps.LatLng(<?php echo $fila["latitud"]?>,<?php echo $fila["longitud"]?>); 
			  var mapOptions = {center: myCenter, zoom: 12};
			  var map = new google.maps.Map(mapCanvas,mapOptions);
			  var marker = new google.maps.Marker({
			    position: myCenter,
			  });
			  marker.setMap(map);
			}		
			</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>	
<h1 class="direccion"><?php echo utf8_encode($fila["direccion"])?> <a class="web" href="http://mapa.buenosaires.gov.ar/comollego/?lat=-34.619930&lng=-58.440228&zl=12&modo=transporte&dir=<?php echo $fila["direccion"]?>." target="_blank">(Como llegar?)</a></h1>
</div>
<br>
<footer>
	Prácticas Profesionalizantes ® 2016  - Reservados todos los derechos.<br>
	<a class="pie_Ayuda" href="menuAyuda.php">Ayuda</a>
</footer>
</body>
</html>
