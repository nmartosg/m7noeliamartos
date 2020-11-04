<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['nom']) {
	header("Location:index.php");
}
	
extract($_GET);
require("conn.php");
$sql="SELECT * FROM usuaris WHERE id=$id";

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
$resutat=mysqli_query($mysqli,$sql);
	while ($row=mysqli_fetch_row ($resutat)){
		$id=$row[0];
		$nom=$row[1];
		$email=$row[2];
		$password=$row[3];
		$PassAdmin=$row[4];
	}


?>

<html lang="en">
  <head>
  <title>EDITAR DADES USUARI</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
<center>
	<h2> MODIFICACIÓ DE LES DADES DELS USUARIS REGISTRATS A LA BASE DE DADES usuaris</h2>	
	<h4>Edició de usuarios </h4> 

		<form action="actualizar.php" method="post">
			<p>
				<label>ID:</label> 
				<input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly"><br> <p> La ID no es pot modificar, ja que és una clau primaria</p>                      	
           
			   </p>
			   <p>
				<label> NOM USUARI: </label>           
				<input type="text" name="nom" value="<?php echo $nom?>"><br>             	
           
			   </p>
			   <p>
				<label> PASSWORD USUARI: </label>    
				<input type="text" name="password" value="<?php echo $password?>"><br>                    	
           
			   </p>
			   <p>
				<label> EMAIL USUARI: </label>
				<input type="text" name="email" value="<?php echo $email?>" readonly="readonly"> <br> <p> L'email no es pot modificar, ja que es un usuari registrat, s'ha  de crear un de nou per posar un altre mail.</p>             	
           
			   </p>
			   <p>
				<label> PASSWORD ADMINISTRADOR: </label> 
				<input type="text" name="PassAdmin" value="<?php echo $PassAdmin?>"><br>                       	
           
			   </p>

				
				<br>
				<input type="submit" value="Guardar">
			</form>

				
	<br></br>
    <button><a href="logout.php"> Tanca Sessió </a></li</button>	
	</center>
  </body>
</html>


