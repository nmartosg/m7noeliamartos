<?php

include("contrologin.php");
include("funcions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA PRIVADA</title>
</head>
<body>
<br</br>
<hr /><h2 style="color: #0000FF; "> MODIFICACIÓ DE LES DADES DELS USUARIS REGISTRATS A LA BASE DE DADES usuaris</h2>	


    <a href="edituser.php?emailc=<?=$_SESSION["login"]?>">SI VOLS EDITAR LES TEVES DADES, CLICA AQUI!</a>

    <?php
        if(isAdmin($_SESSION["login"])){

            $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
            $sql = "select * from usuaris  ";
            if (!$resultado = $conn->query($sql)) {
              die("Error:".$conn->error);
            }
              while($usuari=$resultado->fetch_assoc()){            

                echo "<br></br><strong>NOM: </strong> ".$usuari["nom"]."<br></br><strong>EMAIL: </strong>".$usuari["email"]."<a href=\"edituser.php?emailc=".$usuari["email"]."\"><br></br>EDITAR</a><a onclick=\"return confirm('ESTAS SEGUR DE ELIMIAR AQUEST USUARI?')\" href=\"delete.php?id=".$usuari["id"]."\">&nbsp; &nbsp;ELIMINAR</a><br>";
              }
        }


        //PRODUCTES DE L'USUARI QUE HA FET LOGIN

        echo "<hr /><br><h2>PRODUCTES DEL BACKOFFICE</h1><br><a href=\"afegirproducte.php\">CLICA AQUI PER AFEGIR PRODUCTES AL BACKOFFICE</a><br></br><hr />";
        echo "<p>LLISTAT CORRESPONENT ALS PRODUCTES DEL USUARI QUE HA FET LOGIN.</p>";
        echo "<br><p><strong>PRODUCTES AMB EL SEU NOM AMB UNA MINI DESCRIPCIÓ I EL PREU:</strong></p><br></br>";

        $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
        $sql = "select * from productes where usuari_id = ".dadesUsuariID($_SESSION["login"]);
        if (!$resultado = $conn->query($sql)) {
          die("Error".$conn->error);
        }
          while($producte=$resultado->fetch_assoc()){
            echo "<strong>NOM:</strong> ".$producte["nom"]." ".$producte["descripcio"]."<br></br><strong> PREU:</strong> ".$producte["preu"]." € &nbsp; &nbsp;  &nbsp; <a href=\"editarproducte.php?idc=".$producte["id"]."\">EDITAR</a><a onclick=\"return confirm('ESTAS SEGUR DE ELIMINAR EL PRODUCTE?')\" href=\"eliminarproducte.php?id=".$producte["id"]."\">      &nbsp;      ELIMINAR </a><br></br><br></br>";

          }
    ?>
</body>
</html>