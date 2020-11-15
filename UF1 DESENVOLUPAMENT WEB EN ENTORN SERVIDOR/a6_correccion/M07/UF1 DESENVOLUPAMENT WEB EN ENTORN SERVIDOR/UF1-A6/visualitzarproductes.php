<?php
include("funcions.php");

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISUALITZAR PRODUCTES</title>
</head>
<style>
    ul{
        list-style-type: none;
    }
    ul  li {
        float: left;
    }

</style>
<body>
    
</body>
</html>

<form method="post">

<center>
<!-- VISUALITZACIO PRODUCTE -->
    <h2 style="color: #0000FF; ">VISUALITZACIÓ DE PRODUCTES</h1>
</center>
		<p>Si vols donar d'alta, modificar o eliminar productes, fes login o registrat en cas de no tenir compte.</p><br>
        <a href="publica.php">Fes login per l'acces complet als productes.</a><br></br>
        <a href="register.php">Crear nou usuari</a><br></br>
    <p>
        <label><strong> CERCADOR DE PRODUCTES:</strong></label>
        <input type="text" name="busca" id=""><br></br>
    </p>
  
<?php

//CATEGORIES

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    $sql = "select * from categoria ";
if (!$resultado = $conn->query($sql)) {
die("Error::".$conn->error);
}
echo "<p>Aqui pot seleccionar el tipus de categoria del teu producte, per tal de facilitar la cerca.</p>";
echo "<select name=\"cat\">";
echo "<option value=\"0\">Diferents categories</option> ";

while($categories=$resultado->fetch_assoc()){
    echo " <option value=\"".$categories["id"]."\">".$categories["nom"]."</option> ";

}
echo "</select>";

?><br>
<center>
    <input type="submit" value="CERCA"><br></br><br></br>   
    <p>PRODUCTES EXISTENTS: </p><br></br>
</form>
</center>
<?php
echo "<ul>";

//PRODUCTES

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    if(isset($_REQUEST["busca"])&&$_REQUEST["busca"]!=""){
        if ($_REQUEST["cat"]!=0){
            //filtro de cat
            $sql = "select * from productes inner join categoria_producte on categoria_producte.producte_id=productes.id  where categoria_producte.categoria_id=".$_REQUEST["cat"]." and (upper(nom) like concat('%',upper('".$_REQUEST["busca"]."'),'%')  or  upper(descripcio) like concat('%',upper('".$_REQUEST["busca"]."'),'%')    )";
        }else{
            $sql = "select * from productes where upper(nom) like concat('%',upper('".$_REQUEST["busca"]."'),'%')  or  upper(descripcio) like concat('%',upper('".$_REQUEST["busca"]."'),'%')  ";
        }
    }else if(isset($_REQUEST["busca"])&&$_REQUEST["busca"]==""&&$_REQUEST["cat"]!=0){
        $sql = "select * from productes inner join categoria_producte on categoria_producte.producte_id=productes.id  where categoria_producte.categoria_id=".$_REQUEST["cat"];
    }else{
        $sql = "select * from productes ";
    }
 if (!$resultado = $conn->query($sql)) {
   die("Error:".$conn->error);
 }
   while($producte=$resultado->fetch_assoc()){
     $conn2 = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
        $sql2 = "select * from imatges where producte_id= ".$producte["id"];
     if (!$resultado2 = $conn2->query($sql2)) {
        die("Error".$conn2->error);
      }
      $imagen=$resultado2->fetch_assoc();

      echo "<li><strong>".$producte["nom"]."<p></p><img width=\"100px\" height=\"100px\" src=\"".$imagen["ruta"]."\">  "."</strong></li>";
 }
   echo "</ul>";

?>

