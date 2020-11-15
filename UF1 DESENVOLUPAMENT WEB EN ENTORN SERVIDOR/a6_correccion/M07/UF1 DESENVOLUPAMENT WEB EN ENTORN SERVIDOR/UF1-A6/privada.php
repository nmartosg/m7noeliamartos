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
<h2 style="color: #0000FF; "> MODIFICACIÓ DE LES DADES DELS USUARIS REGISTRATS A LA BASE DE DADES usuaris</h2>	


    <a href="edituser.php?emailc=<?=$_SESSION["login"]?>">SI VOLS EDITAR LES TEVES DADES, CLICA AQUI!</a>
<br>

    <?php
        if(isAdmin($_SESSION["login"])){

            $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
            $sql = "select * from usuaris  ";
            if (!$resultado = $conn->query($sql)) {
              die("Error:".$conn->error);
            }
              while($usuari=$resultado->fetch_assoc()){            

                echo $usuari["nom"].",".$usuari["email"]."<a href=\"edituser.php?emailc=".$usuari["email"]."\">EDITAR</a><a onclick=\"return confirm('ESTAS SEGUR DE ELIMIAR AQUEST USUARI?')\" href=\"delete.php?id=".$usuari["id"]."\">ELIMINAR</a><br>";
              }
        }


        //PRODUCTES DE L'USUARI QUE HA FET LOGIN

        echo "<hr /><br><h2>PRODUCTES DEL BACKOFFICE</h1><br><a href=\"afegirproducte.php\">CLICA AQUI PER AFEGIR PRODUCTES AL BACKOFFICE</a><br></br>";
        echo "<p>LLISTAT CORRESPONENT ALS PRDODUCTES DEL USUARI QUE HA FET LOGIN.</p>";
        echo "<br><p><strong>PRODUCTES AMB EL SEU NOM I EL PREU:</strong></p>";

        $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
        $sql = "select * from productes where usuari_id = ".dadesUsuariID($_SESSION["login"]);
        if (!$resultado = $conn->query($sql)) {
          die("Error".$conn->error);
        }
          while($producte=$resultado->fetch_assoc()){
            echo "NOM: ".$producte["nom"]." &nbsp; PREU: ".$producte["preu"]." € &nbsp;  &nbsp; <a href=\"editarproducte.php?idc=".$producte["id"]."\">EDITAR</a><a onclick=\"return confirm('ESTAS SEGUR DE ELIMINAR EL PRODUCTE?')\" href=\"eliminarproducte.php?id=".$producte["id"]."\">     &nbsp       ELIMINAR </a><br></br>";


          }
    ?>
</body>
</html>