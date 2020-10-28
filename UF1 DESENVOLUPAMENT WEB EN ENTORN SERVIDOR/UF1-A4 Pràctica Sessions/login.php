<?php
session_start();
include("controlador_login.php"); //Per fer el control després del login
// Si s'accepta la política
if(isset($_REQUEST['politicaCookies'])) {
    if($_REQUEST['politicaCookies']="Aceptar"){
    // Calculamos la caducidad, en este caso un año
    $caducidad = time() + (60 * 60 * 24 * 365);
    // Crea una cookie con la caducidad
    setcookie('politica', 'Aceptar', $caducidad);
    header('location:login.php');
    }
// Sino s'accepta la politica es redirigeix a la pagina de google
}else if(isset($_REQUEST['politicaCookies'])){
    if ($_REQUEST['politicaCookies']="Cancelar"){
        header('location:http://www.google.com');
    }
}

if (!isset($_COOKIE['politica'])){
?>
    <div class="cookies">
        <h2>Cookies</h2>
        <p>Acceptes les cookies requerides?</p>
        <a href="?politicaCookies=1"><button type="submit">Aceptar</button></a>
        <a href="https://www.google.es/"><button type="submit" >Cancelar</button></a></a>
    </div>
       
<?php
//Com s'ha acceptat la politica es printa el formulari d'inici de sessió.
}else{
    $errormail=$_SESSION["errormail"];
    $errorcontra=$_SESSION["errorcontra"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Practica sessions Noelia Martos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        <header>
		    <h1>BENVINGUT A L'APLICACIÓ WEB</h1>
        </header>
		    <h2>Login Usuari</h2>
        <form method="post">
            <p> 
                <label> Email </label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required><?if (isset($_SESSION["errormail"])){echo $_SESSION["errormail"];}?> 
            </p> 
            <p>
                <label> Contrasenya </label>
                <input type="password" name="contrasenya" placeholder="Contraseña"><?if (isset($_SESSION["errorcontra"])){echo $_SESSION["errorcontra"];}?>
            </p>
            <p>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Recordarme
                </label>
            </p>
            <p>
                <br><button type="submit" value="Entrar">LOGIN</button>
            </p>
        </form>
        
    </body>
</html>

<?php
}
?>
