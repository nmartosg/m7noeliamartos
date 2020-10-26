<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
$_SESSION["errormail"]="";
$_SESSION["errorcontra"]="";
    // Comprovem que ens arriba l'informació del registre.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Registre requerit per accedir a la web.
    $registre = ['email' => 'noelia@gmail.com', 'password' => password_hash('123', PASSWORD_BCRYPT)];
               
    // Variables
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $contrasenya = isset($_REQUEST['contrasenya']) ? $_REQUEST['contrasenya'] : null;

    // Comprovem si les dades del registre són correctes.
    if ($registre['email'] == $email && password_verify($contrasenya, $registre['password'])) {
        // Si són correctes, creeem la sessió
        session_start();
        //Validació dels camps 
        if (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errormail"]="Correo no vàlid.";
        }
        if (!preg_match("/^[a-zA-Z1-9' ]*$/",$_SESSION["contrasenya"])) {
            $_SESSION["errorcontra"]= "només es permeten contrasenyas amb números i lletras.";
        }
        
        $_SESSION['email'] = $_REQUEST['email'];
        // I redireccionem a la pàgina privada.
        header('Location: privada.php');
        die();

    } 
    // Si no son correctes, dona un error i es torna a preguntar.
    else {
        echo '<p style="color: red">Email o la contrasenya són incorrectes.</p>';
        }
    }
?>

