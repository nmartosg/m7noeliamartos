<?php
include("funcions.php");

$errors=false;
$error="";
$errorpassword="";
$errorpasswordRepetida="";
$codi=$_GET["codi"];

$data1= new DateTime(GetDataLink($codi));
$data2=new DateTime(date('Y-m-d H:i:s'));

$dteDiff=$data1->diff($data2);
$diferenciaTemps= $dteDiff->format("%H");

if($diferenciaTemps>02){
    echo "El link enviat pel correu electrònic ha caducat.";
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $password=test_input($_REQUEST["password"]);
        $passwordRepetida=test_input($_REQUEST["repetirPassword"]);
        $codi=$_REQUEST["codi"];
        if(comprovarEmailRecuperarPassword($codi)){

            //Validació del camp password.
            if(empty($password)){
                $errorpassword="<font color='red' size=4> La contrasenya és obligatoria. </font>";
                $errors=true;
            }else if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$password)) {
                $errorpassword= "<br><font color='red' size=3> Nomès s'accepten lletres i números.</font>";
                $errors=true;
            }

            //Validacio de la repeticio de la password
            if(empty($passwordRepetida)){
                $errorpasswordRepetida="<font color='red' size=4> La contrasenya és obligatoria.</font>";
                $errors=true;
            }else if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$passwordRepetida)) {
                $errorpasswordRepetida= "<br><font color='red' size=3> Nomès s'accepten lletres i números.</font>";
                $errors=true;
            }

            if(!$errors){
                if($password==$passwordRepetida){
                    $email=EmailExitsCodi($codi);
                    editarPassword($email, $password);
                    $error="<font color='red' size=3>  El canvi de la contrasenya s'ha efectuat correctament</font>";
                        //AIXO HO HE POSAT D'AQUESTA MANERA PERQUE SINO NO DIU RES I QUEDA A L'AIRE SI ELS CANVIS S'HAN PRODUIT O NO.
                        //PER TANT, MOSTRARA EL MISSATGE Y DESPRÉS L'USUARI ESCULL QUÈ VOL FER.

                }else{
                    $error="Les contrasenyes no coincideixen.";
                }
            }
        }else{
            echo "Error, ha fallat.";
        }
    }

    if(comprovarEmailRecuperarPassword($codi)){

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>CANVIAR CONTRASENYA</title>
    </head>
    <body>

            <h4><span class="error"><?=$error;?></span></h4>
            <h2>Introdueix la nova contrasenya.</h2>
            <form  method="post" name="formulari">
                <p>
                    <h5 style="color: #22BBC4; ">Introdueix la nova contrasenya: </h5> 
                    <input type="password" name="password" />
                    <span class="error"><?=$errorpassword;?></span><br />
                </p>
                <p>
                    <label>Repeteix la contrasenya introduïda: </label> 
                    <input type="password" name="repetirPassword"  />
                    <span class="error"><?=$errorpasswordRepetida;?></span><br />
                </p>
                    <input type="hidden" name="codi" value="<?=$codi?>"><br>

                    <button id="boton"  type="submit" name="canvi">Canviar</button><br></br><br></br>

                <p>
                    <b>INDICA QUE VOLS FER ARA!</b>
                </p>
                <a href="home.php">Tornar enrere.</a><br></br>
            </form>


    </body>
    </html>


    <?php


    }else{
        echo"ERRO EN EL CANVI DE CONTRASENYA.";
    }


}
?>
