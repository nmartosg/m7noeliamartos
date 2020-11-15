<?php

include("contrologin.php");
include("funcions.php");


if(true){

    eliminarImatge($_REQUEST["id"],$_REQUEST["ruta"]);
    header("location:editarproducte.php?idc=".$_REQUEST["idc"]);

}else{
    die("ERROR");
}


?>