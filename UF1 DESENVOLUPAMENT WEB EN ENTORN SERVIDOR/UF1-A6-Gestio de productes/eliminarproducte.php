<?php

include("contrologin.php");
include("funcions.php");

if(ComprovarProducteUsuari($_SESSION["login"],$_REQUEST["id"])){

    eliminarProducte($_REQUEST["id"]);
    header("location:privada.php");

}else{
    die("ERROR");
}
?>