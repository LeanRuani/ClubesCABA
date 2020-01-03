<?php 
	require_once("../conn/connect.php");

	$comuna="";
	$actividad="";

	if (isset($_POST["comuna"])){
		$comuna = $_POST["comuna"];
	}
	if (isset($_POST["actividad"])){
		$actividad = $_POST["actividad"];
	}

	if ($comuna=="Cualquiera" && $actividad!="Cualquiera") {
		#buscame por actividad.
		$consulta2="SELECT club.club_id, club.nombre, club.escudo, barrio.barrio  FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id INNER JOIN club_actividad ON club_actividad.club_id = club.club_id INNER JOIN actividad ON club_actividad.actividad_id = actividad.actividad_id WHERE actividad.actividad='$actividad'";
	}else if ($comuna!="Cualquiera" && $actividad=="Cualquiera") {
		#buscame por barrio.
		$consulta2="SELECT club.club_id, club.nombre, club.escudo, barrio.barrio FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id WHERE barrio.barrio = '$comuna'";

	}else if ($comuna!="Cualquiera" && $actividad!="Cualquiera") {
		# buscame por los dos
		$consulta2 = "SELECT club.club_id, club.nombre, club.escudo, barrio.barrio FROM club  INNER JOIN club_actividad ON club_actividad.club_id = club.club_id INNER JOIN actividad ON club_actividad.actividad_id = actividad.actividad_id INNER JOIN barrio ON club.barrio_id = barrio.barrio_id WHERE barrio.barrio = '$comuna' AND actividad.actividad='$actividad'";
	}else if ($comuna=="Cualquiera" && $actividad=="Cualquiera") {
		$consulta2 = "SELECT club.club_id, club.nombre, club.escudo, barrio.barrio  FROM club 
		INNER JOIN barrio ON club.barrio_id = barrio.barrio_id  ORDER BY RAND() LIMIT 10";
	}
		$resultado2 = $connect ->query($consulta2);
		$fila2 = mysqli_fetch_assoc($resultado2);
		$total2 = mysqli_num_rows($resultado2);
 ?>

 <?php if ($total2>0){ ?>
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
				<a href=club.php?id=<?php echo $fila2["club_id"]?>>
					<div class = "foto"> 
						<img src="data:image/jpg;base64, <?php echo base64_encode($fila2["escudo"]); ?>">
					</div>
				</a>
			</th>
			<th class="center">
				<a href=club.php?id=<?php echo $fila2["club_id"]?>>
		 			<?php echo utf8_encode($fila2["nombre"]) ?> 
		 		</a>
	 		</th>
	 		<th class="center">
	 			<?php echo utf8_encode($fila2["barrio"]) ?>
	 		</th>
		</tr>
<?php } while($fila2=mysqli_fetch_assoc($resultado2));?>
	</table>
</div>
<?php } elseif ($total2>0){
	}else {
		echo "<h2>Perdon. No existen las especificaciones que buscas :(</h2>";
	}
?>
