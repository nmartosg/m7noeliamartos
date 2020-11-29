<?php
include("contrologin.php");

include("funcions.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    afegirProducte($_REQUEST["nom"],$_REQUEST["descripcio"],$_REQUEST["preu"]);
        header("location:privada.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <hr /><title>AFEGIR PRODUCTE</title>
</head>
<body>
<center>
<!-- AFEGIR PRODUCTE -->
    <h2 style="color: #0000FF; ">AFEGIR PRODUCTE</h2>
    <form method="post">
        <p>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom"><br>
        </p>
        <p>    
            <label for="descripcio">Descripció:</label>
            <input type="text" name="descripcio" id="descripcio"><br>
        </p>
        <p>           
            <label for="preu">Preu:</label>
            <input type="text" name="preu" id="preu"><br>
        </p>
        <p>  
            <input type="submit" value="Afegir">
        </p>
</center>
        <p>  

            <hr /><a href="privada.php">ENRERE</a>
        </p>
    </form>

</body>
</html>
