<?php

include("contrologin.php");
include("funcions.php");

if(checkProductUser($_SESSION["login"],$_REQUEST["id"])){

    deleteProduct($_REQUEST["id"]);
    header("location:privada.php");

}else{
    die("ERROR");
}
?>