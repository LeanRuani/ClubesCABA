<!DOCTYPE html>
<?php require_once ("conn/connect.php") ?>
<html>
<head>
	<meta charset="utf-8">
	<title>ClubesCABA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="boot/css/bootstrap.min.css">
	<link rel="shortcut icon" href="img/icono.ico" type="image/ico"/>
	<script type="text/javascript" src= "js/jquery.js"></script>
	<script type="text/javascript" src= "js/ajax.js"></script>
	<script type="text/javascript" src="boot/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
		$(document).ready(function(){
    		$("#bsavd").click(function(){
    			$("#bsavd").prop('disabled', true);
        		$("#search").prop('disabled', true);
        		$("#bsavd").hide();
        		$("#search").hide();
        		$("#panel").show("fast");
    		});
		});</script>
	<script type="text/javascript">
		$(document).ready(function(){
    		$("#vuelta").click(function(){
    			$("#bsavd").prop('disabled', false);
        		$("#search").prop('disabled', false);
        		$("#panel").hide("fast");
        		$("#search").show();
        		$("#bsavd").show();
   			});
		});</script>
</head>

<body>
<!--CABECERA DE LA PAGINA-->
<div class="cabeza">
	<div class="cabeza_logo">
		<a href="http://localhost/clubes"><span>Clubes</span><span>CABA</span></a>
		<h1 class="center">Encontrá tu Club ideal</h1>
	</div>
	<div class="form center form-group">
		<form method="post" name="search_form" id="search_from"><input type="text" name="search" id="search" placeholder="Nombre del club"></form>
		<button class="btn_adv_busqueda" id="bsavd"> <span>Búsqueda Avanzada</span></button>
		<!--filtros-->
		<div class="contenido_avanzado" id="panel" style="height: auto;">
				<div class="item_avanzado">
					<fieldset>
						<label><span>Seleccionar</span> <span>Barrio</span></label><br>
							<select name="bsq_Avd_Barrio" id="comunaAvd">
							<option selected="selected" value>Cualquiera</option>
								<?php
									$consulta = "SELECT barrio_id, barrio FROM barrio ORDER BY barrio ASC";
									$resultado = $connect ->query($consulta);
									$fila = mysqli_fetch_assoc($resultado);
									do{ 
										echo "<option value='".$fila['barrio_id']."'>".$fila["barrio"]."</option>";
									} while($fila=mysqli_fetch_assoc($resultado));	
								?>
						</select>
					</fieldset>
				</div>
					
				<div class="item_avanzado">
					<fieldset>
						<label>Seleccionar Actividad</label><br>
						<select name="bsq_Avd_Actividad" id="actividadAvd">
							<option>Cualquiera</option>
								<?php
									$consulta = "SELECT actividad_id, actividad FROM actividad ORDER BY actividad ASC ";
									$resultado = $connect ->query($consulta);
									$fila = mysqli_fetch_assoc($resultado);
									do{ 
										echo "<option value='".$fila['actividad_id']."'>".$fila["actividad"]."</option>";
									} while($fila=mysqli_fetch_assoc($resultado));	
								?>					
							</select>
					</fieldset>
				</div>
				<button class="Vuelta" id="vuelta">
					<span>Búsqueda Normal</span>
				</button>
			</div>
	</div>
</div>
<div class="container" id="resultados">
<?php
	$consulta = "SELECT club.club_id, club.nombre, club.escudo, barrio.barrio FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id  ORDER BY club.nombre ASC LIMIT 10";
	$resultado = $connect ->query($consulta);
	$fila = mysqli_fetch_assoc($resultado); 
?>
<table class="table table-condensed table-hover">
		<thead>
			<tr>
			<th class="center">Escudo</th>
			<th class="center">Nombre</th>
			<th class="center">Barrio</th>
			</tr>
		</thead>
<?php do { ?>
		<tr class="center">
			<th class="center">
				<a href=club.php?id=<?php echo $fila["club_id"];?>>
					<div class = "foto"> 
						<img src="data:image/jpg;base64, <?php echo base64_encode($fila["escudo"]); ?>">
					</div>
				</a>
			</th>
			<th class="center">
				<a href=club.php?id=<?php echo $fila["club_id"];?>>
		 			<?php echo utf8_encode($fila["nombre"]);?> 
		 		</a>
	 		</th>
	 		<th class="center">
	 			<?php echo utf8_encode($fila["barrio"]);?>
	 		</th>
		</tr>
<?php } while($fila=mysqli_fetch_assoc($resultado));?>
	</table>
</div>
<footer>
	Prácticas Profesionalizantes ® 2016  - Reservados todos los derechos.<br>
	<a class="pie_Ayuda" href="menuAyuda.php">Ayuda</a>
</footer>
</body>
</html>
