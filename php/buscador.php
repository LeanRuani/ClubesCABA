<?php 
	require_once("../conn/connect.php");
	
	$search="";
	if (isset($_POST["search"])){
		$search = $_POST["search"];
	}

	if ($search!="") {
		$resultado = $connect ->query("SELECT club.club_id, club.nombre, club.escudo, barrio.barrio FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id WHERE club.nombre LIKE '%$search%';");
		$fila = mysqli_fetch_assoc($resultado);
		$total = mysqli_num_rows($resultado);
 ?>

 <?php if ($total>0){ ?>	
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
				<a href=club.php?id=<?php echo $fila["club_id"]?>>
					<div class = "foto"> 
						<img src="data:image/jpg;base64, <?php echo base64_encode($fila["escudo"]); ?>">
					</div>
				</a>
			</th>
			<th class="center">
				<a href=club.php?id=<?php echo $fila["club_id"]?>>
		 			<?php echo utf8_encode($fila["nombre"]) ?> 
		 		</a>
	 		</th>
	 		<th class="center">
	 			<?php echo utf8_encode($fila["barrio"]) ?>
	 		</th>
		</tr>
<?php } while($fila=mysqli_fetch_assoc($resultado));?>
	</table>
	<?php }else{
			echo "<h2>No se han encontrado resultados correctos.</h2>";
	}?>
	<?php }else{

		$resultado2 = $connect ->query("SELECT club.club_id, club.nombre, club.escudo, barrio.barrio FROM club INNER JOIN barrio ON club.barrio_id = barrio.barrio_id ORDER BY RAND();");
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
	<?php }
	 }
?>

