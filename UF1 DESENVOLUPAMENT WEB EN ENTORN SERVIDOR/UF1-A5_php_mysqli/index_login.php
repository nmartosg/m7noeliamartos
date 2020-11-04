<!DOCTYPE html>
<html>
<head>
	<title>Practica A05_NoeliaMartos</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body >
	<!-- LOGIN USUARI -->
	<center><h2 style="color: #0000FF; ">LOGIN USUARI</h2>

    <form action="control_login.php" method="post">   
        <p>
            <label> EMAIL: </label>                        	
            <input type="email" name="email" placeholder="Email" required>     
        </p>
        <p>
            <label> CONTRASENYA: </label>   
            <input type="password"name="password" placeholder="Password" required><br>
        </p>
		<button type="submit">LOGIN</button>
	</form>

<br></br>
<p><a href='recuperar_contrasenya.php'>SI T'HAS OBLIDAT DE LA CONTRASENYA, CLICA AQUI PER RECUPERAR-LA.</a></p>
</body>
</html>