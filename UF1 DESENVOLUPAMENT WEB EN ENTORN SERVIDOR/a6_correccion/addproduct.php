
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
    <title>Añadir producto</title>
</head>
<body>
    <form method="post">S

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom"><br>
        <label for="desc">Descripcion:</label>
        <input type="text" name="desc" id="desc"><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio"><br>

        <input type="submit" value="Afegeix producte">


        <a href="privada.php">Tornar</a>


    </form>
</body>
</html>