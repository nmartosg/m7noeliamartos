<?php
extract($_POST);	
	//extraer todos los valores del metodo post del formulario de actualizar
	require("conn.php");
	$parametres_passats_bd="update usuaris set nom='$nom', email='$email', password='$password', PassAdmin='$PassAdmin' where id='$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resultat=mysqli_query($mysqli,$parametres_passats_bd);
	if ($resultat==null) {
		echo "ERROR AL ACTUALITZAR LES DADES MODIFICADES";
		header("location: edicio_dades_admin.php");
		
	}else {
		header("location: edicio_dades_admin.php");
	}
?>