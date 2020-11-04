<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['nom']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
	header("Location:modificar_dades_usuari.php");
}
?>
<html lang="en">
  <head>
    <title>EDICIO DADES ADMINISTRADOR</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body >
<center>
    <h1>BENVINGUT ADMINISTRADOR AL CANVI DE DADES DELS USUARIS</h1>
        <?php

	        require("conn.php");
        	$sql=("SELECT * FROM usuaris");
	        $resultat=mysqli_query($mysqli,$sql);

		        echo '<table border="1"
			        <tr >
			        	<td>ID</td>
				        <td>NOM</td>
			        	<td>EMAIL</td>
			        	<td>PASSWORD</td>
			        	<td>PASSWORD DEL ADMINISTRADOR</td>
			        	<td>EDITAR</td>
						<td>BORRAR</td>
		            </tr>';
        ?>
			  
            <?php 
                //PRINTA TOTES LES DADES DELS USUARIS
                while($fila=mysqli_fetch_array($resultat)){
		            echo "<tr>";
		                echo "<td>$fila[0]</td>";
	    	            echo "<td>$fila[1]</td>";
	    	            echo "<td>$fila[2]</td>";
	    	            echo "<td>$fila[3]</td>";
		                echo "<td>$fila[4]</td>";

	    	            echo "<td><a href='editar_dades.php?id=$fila[0]'>EDITAR</a></td>";
	            	    echo "<td><a href='edicio_dades_admin.php?id=$fila[0]&idborrar=2'>ELIMINAR</a></td>";	
	        	    echo "</tr>";
			    }

		        echo "</table>";
            //ELIMINA USUARIS
	        extract($_GET);
		        if(@$idborrar==2){
			        $sqlborrar="DELETE FROM usuaris WHERE id=$id";
                    $borrar=mysqli_query($mysqli,$sqlborrar);
                    header("location: edicio_dades_admin.php");
		
				}
            ?>
	
	</center>
    <br></br>
	<h3>CREACIO DE COMPTES PER L'ADMINISTRADOR</h3>
	<form method="post" action="index_registre_peradmin.php" method="POST">
			<p>
				<label > NOM: </label>
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
	<br></br>

	<button><a href="logout.php"> Tanca Sessió </a></li</button>

  </body>
</html>