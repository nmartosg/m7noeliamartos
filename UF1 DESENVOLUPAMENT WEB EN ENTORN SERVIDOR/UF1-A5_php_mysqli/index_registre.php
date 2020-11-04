<?php
	if(isset($_POST['submit'])){
		require("registre_usuari.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Practica A05_NoeliaMartos</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body >
<center><h2 style="color: #0000FF; ">REGISTRE USUARI</h2>
		<form method="post" action="registre_usuari.php" method="POST">
			<p>
				<label> NOM: </label>
				<input type="text" name="name" placeholder="Introdueix un nom" required>	
			</p>
			<p>	
				<label> EMAIL: </label>
				<input type="email"  name="email" aria-describedby="emailHelp" placeholder="Introdueix un email" required>
			</p>
			<p>
				<label> CONTRASENYA: </label>
				<input type="password" name="password" placeholder="Introdueix una contrasenya" required>  
			</p>
			<p>
				<label> REPETEIX CONTRASENYA: </label>
				<input type="password" name="repetirpassword" placeholder="Repeteix la contrasenya" required>  
			</p>
		<button type="submit">Crear compte</button>
	</form>		
</body>
</html>