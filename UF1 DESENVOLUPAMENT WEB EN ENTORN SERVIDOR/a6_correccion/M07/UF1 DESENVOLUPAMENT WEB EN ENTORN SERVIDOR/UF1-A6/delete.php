<?php
include("contrologin.php");
include("funcions.php");

if($_SESSION["login"]=="noelia@gmail.com"){
    deleteUser($_REQUEST["id"]);
    header("location:privada.php");

}else{
    die("ERROR");
}
?>