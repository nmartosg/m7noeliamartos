<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['nom']) {
	header("Location:index.php");
}
	
extract($_GET);
require("conn.php");
?>
<html lang="en">
  <head>
    <title>EDICIO DADES ADMINISTRADOR</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body >
<center>
    <h1>BENVINGUT ADMINISTRADOR AL CANVI DE DADES DELS USUARIS</h1>
    <h2>L'USUARI PER FER ELS CANVIS A LA BASE DE DADES ÉS:  <?php echo $_SESSION['nom'];?> </h2>
        <?php
	        require("conn.php");
            $sql="SELECT * FROM usuaris WHERE id='".$_SESSION['id']."'";	        
            $resultat=mysqli_query($mysqli,$sql);

                echo '<h2>Aquestes són totes les teves dades</h2>
                 <table border="1"
			        <tr >
			        	<td>ID</td>
				        <td>NOM</td>
			        	<td>EMAIL</td>
			        	<td>PASSWORD</td>
			        	<td>PASSWORD DEL ADMINISTRADOR</td>
			        	<td>EDITAR</td>

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

	        	    echo "</tr>";
			    }

		        echo "</table>";
           
            ?>
	
	</center>
  
	<br></br>

	<button><a href="logout.php"> Tanca Sessió </a></li</button>

  </body>
</html>