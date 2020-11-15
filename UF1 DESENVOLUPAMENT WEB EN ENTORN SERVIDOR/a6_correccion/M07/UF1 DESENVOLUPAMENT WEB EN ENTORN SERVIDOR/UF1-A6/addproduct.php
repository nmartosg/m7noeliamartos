<?php
include("contrologin.php");

include("funcions.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
        addProduct($_REQUEST["nom"],$_REQUEST["desc"],$_REQUEST["precio"]);
        header("location:privada.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afegir producte</title>
</head>
<body>
<center>
    <h2 style="color: #0000FF; ">AFEGIR PRODUCTE</h2>
    <form method="post">
        <p>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom"><br>
        </p>
        <p>    
            <label for="desc">Descripció:</label>
            <input type="text" name="desc" id="desc"><br>
        </p>
        <p>           
            <label for="precio">Preu:</label>
            <input type="text" name="precio" id="precio"><br>
        </p>
        <p>  
            <input type="submit" value="Afegir">
        </p>
</center>
        <p>  

            <a href="privada.php">ENRERE</a>
        </p>
    </form>

</body>
</html>
