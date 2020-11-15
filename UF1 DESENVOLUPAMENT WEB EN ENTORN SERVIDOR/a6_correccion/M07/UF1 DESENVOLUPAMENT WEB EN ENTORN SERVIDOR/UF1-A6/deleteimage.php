<?php

include("contrologin.php");
include("funcions.php");

if(true){

    deleteImage($_REQUEST["id"],$_REQUEST["ruta"]);
    header("location:editproduct.php?idc=".$_REQUEST["idc"]);

}else{
    die("ERROR");
}


?>