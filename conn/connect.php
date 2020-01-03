<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$bdd ="clubes.proyecto";

	$connect = new  mysqli($host, $user, $pass, $bdd) or die ("error" . mysqli_errno($connect));

 ?>