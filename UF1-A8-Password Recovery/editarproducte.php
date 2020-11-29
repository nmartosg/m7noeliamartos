<?php
include("contrologin.php");
include("funcions.php");

$nom = "";
$descripcio =  "";
$preu =  "";
$id = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!ComprovarProducteUsuari($_SESSION["login"],$_REQUEST["idc"])){
        die("ERROR");
    }
    if(isset($_FILES["imagen"])){
        mkdir("imatges/".dadesUsuariID($_SESSION["login"]), 0777);
        $dir_subida = 'imatges/'.dadesUsuariID($_SESSION["login"])."/";
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
          afegirImatgeProducte($fichero_subido,$_FILES['imagen']['name'],$_REQUEST["idc"]);
            header("location:editarproducte.php?idc=".$_REQUEST["idc"]);
        } else {
            die("NO S'HA POGUT PUJAR EL FITXER.");
        }
    }else{
      actualitzarProducte($_REQUEST["nom"],$_REQUEST["descripcio"],$_REQUEST["preu"],$_REQUEST["idc"]);
        header("location:privada.php");
    }
}else{
    if(!ComprovarProducteUsuari($_SESSION["login"],$_REQUEST["idc"])){
        die("ERROR");
    }else{

            $producte = dadesProductes($_REQUEST["idc"]);
            $nom = $producte["nom"];
            $descripcio = $producte["descripcio"];
            $preu = $producte["preu"];
            $id = $producte["id"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- EDITAR PRODUCTE -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUCTE</title><hr />
</head>
<body>

<? if(isset($_REQUEST["msg"])){ echo $_REQUEST["msg"]; }   ?>
<form method="post">
<center>
    <h2 style="color: #0000FF; ">EDITAR PRODUCTE</h2><hr />
      <h3><strong>CARACTERISTIQUES DEL PRODUCTE</strong></h3>
      <p>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?=$nom?>"><br>
      </p>
      <p>
        <label for="descripcio">Descripció:</label>
        <input type="text" name="descripcio" id="descripcio"  value="<?=$descripcio?>"><br>
      <p>
      </p>
        <label for="preu">Preu:</label>
        <input type="text" name="preu" id="preu"  value="<?=$preu?>"><br>
      <p>
      </p>
        <input type="hidden" name="id" id="id"   value="<?=$id?>"><br>
        <input type="hidden" name="idc" id="id"   value="<?=$_REQUEST["idc"]?>">
        <input type="submit" value="Editar">

</form>
<!-- IMATGE PRODUCTE -->
<hr /><h3>IMATGES DEL PRODUCTE</h3>
</center>
<form  enctype="multipart/form-data" method="post">
<input type="file" name="imagen" id="">
<input type="hidden" name="idc" id="id"   value="<?=$_REQUEST["idc"]?>"><br>

<br><input type="submit" value="Afegir la nova imatge">
</form>

<?php

 $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
 $sql = "select * from imatges where producte_id = ".$_REQUEST["idc"];
 if (!$resultado = $conn->query($sql)) {
   die("Error:".$conn->error);
 }
 while($imagenes=$resultado->fetch_assoc()){
     echo "<img width=\"100px\" height=\"50px\" src=\"".$imagenes["ruta"]."\">  "."<a onclick=\"return confirm('ESTAS SEGUR DE ELIMINAR LA IMATGE DEL PRODUCTE?')\" href=\"eliminarimatge.php?ruta=".$imagenes["ruta"]."&idc=".$_REQUEST["idc"]."&id=".$imagenes["id"]."\"><br>SI VOLS ELIMIAR LA IMATGE, CLICA AQUÍ.</br></a><br>";

}
?>

<hr />

<!-- AFEGIR CATEGORIA -->
<center>
<h3>AFEGIR UNA CATEGORIA AL PRODUCTE SELECCIONAT</h3>
</center>
<p>Aquestes són les diferents categories de les quals disposa la base de dades, escull una pel teu producte.</p>
<center>
<?php

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
$sql = "select * from categoria where id not in ( SELECT categoria_id FROM categoria_producte where producte_id=".$_REQUEST["idc"]." )";
if (!$resultado = $conn->query($sql)) {
  die("Error:".$conn->error);
}
while($categoria=$resultado->fetch_assoc()){
    echo "<a  href=\"afegirproductecategoria.php?cat=".$categoria["id"]."&prod=".$_REQUEST["idc"]."\">".$categoria["nom"]."</a> &nbsp; &nbsp; ";

  }
?>
</center>
<h4>Categories del producte:</h4>

<?php
 $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
 $sql = "select c.id, c.nom from categoria_producte cp inner join categoria c on c.id=cp.categoria_id where cp.producte_id = ".$_REQUEST["idc"];
 if (!$resultado = $conn->query($sql)) {
   die("Error:".$conn->error);
 }
   while($categoria=$resultado->fetch_assoc()){
     echo $categoria["nom"]."&nbsp; &nbsp;<a href=\"eliminarcategoria.php?cat=".$categoria["id"]."&prod=".$_REQUEST["idc"]."\">ELIMINAR CATEGORIA</a><br> ";
   }
?>
<br>
<hr /><a href="privada.php">ENRERE</a>

</body>
</html>

<?

}
