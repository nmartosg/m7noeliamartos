<?php
include("funcions.php");
$errors=true;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_REQUEST["pass1"]==$_REQUEST["pass2"]){
    if(!checkIfEmailExists($_REQUEST["email"])){
        if(addUser($_REQUEST["nom"],$_REQUEST["email"],$_REQUEST["pass1"])){

                echo "Usuari creat correctament, pots fer login <a href=\"publica.php\">aquí</a>";
                $errors=false;
        }
    }else{
        echo "Aquest email ja existeix....<br>";  
    }
  }else{
      echo "Els passwords no coincideixen....<br>";
  }

}

if($errors){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTRE D'USUARI</title>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center><h2 style="color: #0000FF; ">REGISTRE USUARI</h2>
    <form method="post">
        <p>
            <label for="nom">NOM:</label>
            <input type="text" name="nom" id="nom"><br>
        </p>
        <p>
            <label for="email">EMAIL:</label>
            <input type="email" name="email" id="email"><br>
        </p>
        <p>
            <label for="pass1">CONTRASENYA:</label>
            <input type="password" name="pass1" id="pass1"><br>
        </p>
        <p>
            <label for="pass2">REPETEIX CONTRASENYA:</label>
            <input type="password" name="pass2" id="pass2"><br>
        </p>
        <p>
            <input type="submit" value="Afegeix">
        </p>
    </form>
</body>
</html>
<?php
}
?>



