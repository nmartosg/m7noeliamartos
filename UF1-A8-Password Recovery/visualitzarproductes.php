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
    <hr /><h2 style="color: #0000FF; ">VISUALITZACIÓ DE PRODUCTES</h1><hr />
</center>
		<p>Si vols donar d'alta, modificar o eliminar productes, fes login o registrat en cas de no tenir compte.</p><br>
        <a href="publica.php">Clica aqui per fer login per l'acces complet als productes.</a><br></br>
        <a href="register.php">Clica aqui per crear nou usuari.</a><br></br><hr />
    <p>
        <label><strong> CERCADOR DE PRODUCTES:</strong></label>
        <input type="text" name="busca" id=""><br></br>
    </p>
  
<?php

//CATEGORIES

    //MOSTRA UN MENÚ DESPLEGABLE EN EL QUAL CONTÉ TOTES LES CATEGORIES QUE DISPOSA LA BASE DE DADES CATEGORIES
    //PER DEFECTE MOSTRAR EL MISSATGE ("diferents categories") PER TANT AL DONAR-LI A MOSTRAR DL DEPLEGAMENT MOSTRARA LES CATEGORIES SEGÜENTS:("alimentacio", "roba", "tecnologia") QUE SÓN LES DIFERENTS CATEGORIES QUE DISPOSA LA BASE DE DADES).

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    $sql = "select * from categoria ";
if (!$resultado = $conn->query($sql)) {
die("Error::".$conn->error);
}
echo "<p>Aqui pot seleccionar el tipus de categoria del teu producte, per tal de facilitar la cerca.</p>";
echo "<select name=\"cat\">";
echo "<option value=\"0\">Selecciona una categoria</option> ";

while($categories=$resultado->fetch_assoc()){
    echo " <option value=\"".$categories["id"]."\">".$categories["nom"]."</option> ";

}
echo "</select>";

?>
<center>
    <input type="submit" value="CERCA"><br></br><hr />
    <p><strong>PRODUCTES EXISTENTS A LA BASE DE DADES:</strong> </p>
</form>
</center>
<?php
echo "<ul>";

//CONTROL DEL CERCADOR

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    if(isset($_REQUEST["busca"])&&$_REQUEST["busca"]!=""){

        if ($_REQUEST["cat"]!=0){
            $sql = "select * from productes inner join categoria_producte on categoria_producte.producte_id=productes.id  where categoria_producte.categoria_id=".$_REQUEST["cat"]." and (upper(nom) like concat('%',upper('".$_REQUEST["busca"]."'),'%')  or upper(descripcio) like concat('%',upper('".$_REQUEST["busca"]."'),'%'))";
        }else{
            $sql = "select * from productes where upper(nom) like concat('%',upper('".$_REQUEST["busca"]."'),'%') or upper(descripcio) like concat('%',upper('".$_REQUEST["busca"]."'),'%')  ";
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

