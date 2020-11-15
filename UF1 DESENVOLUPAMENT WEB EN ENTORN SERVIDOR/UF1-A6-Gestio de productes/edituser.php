<?php
include("contrologin.php");
include("funcions.php");

$nom="";
$id="";
$email="";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    if($_SESSION["id"]!=$_REQUEST["id"] && !isAdmin($_SESSION["login"]) ){

        die("ERROR");

    }

    if($_REQUEST["pass1"]==$_REQUEST["pass2"]){
        if($_REQUEST["email"]==$_REQUEST["emailc"] ||  ($_REQUEST["email"]!=$_REQUEST["emailc"]   && !checkIfEmailExists($_REQUEST["email"]))){
            updateUser($_REQUEST["nom"],$_REQUEST["email"],$_REQUEST["pass1"],$_REQUEST["id"]);
            
            if(!isAdmin($_SESSION["login"])){
                $_SESSION["login"]=$_REQUEST["email"];
                header("location:edituser.php?msg=Canvis_ok&emailc=".$_REQUEST["email"]);

            }else{
                header("location:privada.php");

            }
        }else{
            echo "---->".$_SESSION["login"]."<-----".$_REQUEST["email"];
            header("location:edituser.php?msg=email_existeix&emailc=".$_SESSION["login"]);

            
        }
     }else{
        echo "Els passwords no coincideixen....<br>";
    }
}else{
    if($_SESSION["login"]!=$_REQUEST["emailc"] && !isAdmin($_SESSION["login"])){

        die("ERROR");
    }else{

            $user = getUserData($_REQUEST["emailc"]);
            $nom = $user["nom"];
            $id = $user["id"];
            $email = $user["email"];
            $_SESSION["id"]=$id;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- EDITAR USUARI -->
    <title>EDITAR USUARI</title>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<? if(isset($_REQUEST["msg"])){ echo $_REQUEST["msg"]; }   ?>
<center>
<form method="post">
    <p>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?=$nom?>"><br>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"  value="<?=$email?>"><br>
    </p>
    <p> 
        <label for="pass1">Pass:</label>
        <input type="password" name="pass1" id="pass1"><br>
    </p>
    <p>
        <label for="pass2">Repeteix pass:</label>
        <input type="password" name="pass2" id="pass2">
    </p>
    <p>
        <input type="hidden" name="id" id="id"   value="<?=$id?>"><br>
        <input type="hidden" name="emailc" id="id"   value="<?=$_REQUEST["emailc"]?>">
    </p>
    <p>
        <input type="submit" value="Editar">
    </p>
</form>

<a href="privada.php">ENRERE</a>
</center>
</body>
</html>
<?
}
?>


