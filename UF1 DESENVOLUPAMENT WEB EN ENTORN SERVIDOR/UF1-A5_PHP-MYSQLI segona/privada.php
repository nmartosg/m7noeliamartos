<?php

include("contrologin.php");
include("funcions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOSTRA LA EDICIO DADES</title>
</head>
<body>
<br</br>
<h2> MODIFICACIÓ DE LES DADES DELS USUARIS REGISTRATS A LA BASE DE DADES usuaris</h2>	


    <a href="edituser.php?emailc=<?=$_SESSION["login"]?>">SI VOLS EDITAR LES TEVES DADES, CLICA AQUI!</a>
<br>

    <?php
        if(isAdmin($_SESSION["login"])){

            $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
            $sql = "select * from usuaris  ";
            if (!$resultado = $conn->query($sql)) {
              die("error ejecutando la consulta:".$conn->error);
            }
              while($usuari=$resultado->fetch_assoc()){            

                echo $usuari["nom"].",".$usuari["email"]."<a href=\"edituser.php?emailc=".$usuari["email"]."\">[EDITAR]</a><a onclick=\"return confirm('Are you sure?')\" href=\"delete.php?id=".$usuari["id"]."\">[DELETE]</a><br>";
              }
        }
    ?>
</body>
</html>




