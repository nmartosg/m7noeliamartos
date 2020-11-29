<?php

include("contrologin.php");
include("funcions.php");

if(true){

    eliminarProducteCategoria($_REQUEST["cat"],$_REQUEST["prod"]);
    header("location:editarproducte.php?idc=".$_REQUEST["prod"]);

}else{
    die("ERROR");
}


?>