<?php
// Activa sessions
session_start();
// Comrova si existeix la sessió email, sino torna a la pàgina de login.php
if (!isset($_SESSION['email'])) header('Location: login.php');
?>
<html>
<head>
	<title>EL teu compte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        <p>
        Aquesta és la pàgina principal de l'aplicació web, vols manetenir-te a la pàgina.<br>
        Si es que SI no fasis res. <br>Si vols sortir , haurás de donar-li l'opció de sortir.<br> 
        Vigila! Aquesta et tancara sessió.
        </p>
        <p>
            <a href="logout.php"><button type="submit" value="Entrar">LOGOUT</button></a>
        </p>
    </body>
</html>