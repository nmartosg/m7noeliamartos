<?php

include("contrologin.php");
include("funcions.php");

//deberiamos comprobar que la imagen es del usuario.
if(true){

    deleteProductCategory($_REQUEST["cat"],$_REQUEST["prod"]);
    header("location:editproduct.php?idc=".$_REQUEST["prod"]);

}else{
    die("ERROR");
}


?>