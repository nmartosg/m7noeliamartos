<?php

include("contrologin.php");
include("funcions.php");

$conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
$sql = "insert into categoria_producte (categoria_id,producte_id) values (".$_REQUEST["cat"].",".$_REQUEST["prod"].") ";
if (!$resultado = $conn->query($sql)) {
  die("Error:".$conn->error);
}

header("location:editproduct.php?idc=".$_REQUEST["prod"]);

?>