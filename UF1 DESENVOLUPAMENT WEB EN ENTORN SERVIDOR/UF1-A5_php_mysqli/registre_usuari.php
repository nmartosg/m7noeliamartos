<!doctype html>
<html lang="en">
  <head>
    <title>REGISTRE USUSARI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>

<div class="container">

	<?php

	require("conn.php");
    //Comprova si el correu existeix a la BD d'usuaris
	$comprovacio_email = "SELECT * FROM usuaris WHERE email = '$_POST[email]' ";

	$resultat = $mysqli-> query($comprovacio_email);
    // Si al comprovar si existeix el correo a la BD existeix, es sumara 1 per tant no es podra fer el registre, ja que no e poden respetir dos correos.
	$existeix = mysqli_num_rows($resultat);
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$repetirpass=$_POST['repetirpassword'];
	if($pass==$repetirpass){
	if ($existeix == 1) {
	echo "  <p>Aquest email ja existeix a la base de dades d'usuari, per tant no es pot completar el registre.</p>
            <br>Si vols iniciar sessió clica al enllaç de LOGIN
		    <p><a href='index_login.php'>Login usuari</a></p>"; 
			//Sino existeix entrara aqui i es creara l'usuari amb les dades introduides.		
	} else {	
	
	// Es fa el registre si tot es correcte
	$query = "INSERT INTO usuaris (nom, email, Password, PassAdmin, rol) VALUES ('$name', '$email', '$pass', '', '2')";  //al rol introdueixo un 2, ja que només l'administrador pot efectuar canvis en tots els usuaris.

	if (mysqli_query($mysqli, $query)) {
		echo "<h4>S'ha creat el compte correctament!</h4>
		<a href='index_login.php'>Inici sessió aqui!</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
		}	
	}	
}else{
	echo "<p>Las contraseñas son incorrectas</p>
	<a href='index_registre.php'>Torna per fer el registre!</a>";
	
}
	mysqli_close($mysqli);
	?>
</div>
  </body>
</html>