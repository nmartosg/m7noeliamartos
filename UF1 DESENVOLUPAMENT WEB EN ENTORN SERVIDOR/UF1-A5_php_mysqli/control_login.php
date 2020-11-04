<?php
session_start();
	require("conn.php");

	$email=$_POST['email'];
	$password=$_POST['password'];


	//Controla les dades només del administrador.
	$sqladmin=mysqli_query($mysqli,"SELECT * FROM usuaris WHERE email='$email'");
	if($admin=mysqli_fetch_assoc($sqladmin)){
		if($password==$admin['PassAdmin']){
			$_SESSION['id']=$admin['id'];
			$_SESSION['nom']=$admin['nom'];
			$_SESSION['rol']=$admin['rol'];

			//Redirreccio a la pagina de edicio de dades del administrador
			echo "<script>location.href='edicio_dades_admin.php'</script>";
		
		}
	}

	//controla tots els usuaris exepte administrador
	$sqlusuaris=mysqli_query($mysqli,"SELECT * FROM usuaris WHERE email='$email'");
	if($usuari=mysqli_fetch_assoc($sqlusuaris)){
		if($password==$usuari['password']){
			$_SESSION['id']=$usuari['id'];
			$_SESSION['nom']=$usuari['nom'];
			$_SESSION['rol']=$usuari['rol'];

			header("Location: modificar_dades_usuari.php");
		}else{
			echo "<p>CONTRASEÑA INCORRECTA</p> 
			<p><a href='index_login.php'>Torna-ho a intentar</a></p>";

		}
	}else{
		echo "AQUEST USUARI NO EXISTEIX, REGISTRA'T ABANS DE FER LOGIN.
		<p><a href='index_registre.php'>Torna-ho a intentar</a></p>";
	}

?>