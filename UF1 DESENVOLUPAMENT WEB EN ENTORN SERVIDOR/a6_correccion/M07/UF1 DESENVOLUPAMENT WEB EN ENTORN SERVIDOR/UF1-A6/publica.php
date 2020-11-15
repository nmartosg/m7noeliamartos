<?php
include("funcions.php");

session_start();
$error=FALSE;
$errormsg="";

if(isset($_REQUEST["okp"])){
    setcookie('politica', 1, time() + 365*24*60*60); 
    header("location:publica.php");
}

if(isset($_COOKIE["email"])){
    if(validaUsuari($_COOKIE["email"],$_COOKIE["password"])){
            $_SESSION["login"]=$_COOKIE["email"];
            header('location:privada.php');
    }else{
        setcookie('email', null, 0,'/'); 
        setcookie('password', null, 0,'/'); 
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pass=test_input($_REQUEST["password"]);
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error=TRUE;
            $errormsg.= "Invalid email format";
        }
        $password = test_input($_POST["password"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/",$password)) {
            $error=TRUE;
            $errormsg.=  "Only letters and numbers allowed";
        }
        if(!$error){
            if(validaUsuari($_REQUEST["email"],md5($_REQUEST["password"]))){
                echo "Autenticació correcte";
                $_SESSION["login"]=$_REQUEST["email"];
                if(isset($_REQUEST["recorda"])){
                    setcookie('email', $_REQUEST["email"], time() + 365*24*60*60,'/'); 
                    setcookie('password', md5($_REQUEST["password"]), time() + 365*24*60*60,'/'); 
                }
                header('location:privada.php');
            }else{
    
                echo "Error de autenticació";
                setcookie('contador', null, 0); 
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA PUBLICA</title>
    <script>
        function check(){

            if(!document.forms[0].email.value.length>0){
                alert("Has d'introduir un email per fer la recuperació de la contrasenya.");
            }else{
                location.href="recoverypassword.php?email="+document.forms[0].email.value;
            }
        }
    
    </script>
    <style>
        ul{
            list-style-type: none;
        }
        ul  li {
            float: left;
        }
    </style>
</head>
<body>

<?php
if(!isset($_COOKIE["politica"])){
?>
Vols acceptar la política de cookies?<br>
<a href="?okp">Accepto</a><br>
<a href="http://www.google.com">No Accepto</a>
<?php
}else{

?>
    <!-- LOGIN USUARI -->
    <center><h2 style="color: #0000FF; ">LOGIN USUARI</h2>
        <h1><?=$errormsg?></h1>
        <form method="post">
            <p>
                <label> EMAIL: </label>
                <input type="text" name="email" id=""><br>
            </p>
            <p>
                <label> CONTRASENYA: </label> 
                <input type="password" name="password" id=""><br>
            </p>
            <p>
                <label> AUTOLOGIN: </label> 
                <input type="checkbox" name="recorda" id=""><br></br>
                <input type="submit" value="SIGN IN">
            </p>
        </form>
        <br>
        <a href="#" onclick="check();"> Regenerar password</a>
        <a href="register.php">Crear nou usuari</a><br>
        <a href="visualitzarproductes.php">Visualitzar productes</a>

        <?
    
    }
?>
</body>
</html>

