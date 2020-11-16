<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//CONECTAR A LA BASE DE DADES
function connectDB($server,$user,$pass,$db){
    $conn = new mysqli($server,$user,$pass,$db);
    if ($conn->connect_error) {
      die("Error de la conexio amb la base de dades: " . $conn->connect_error);
    }
    return $conn;
}

/////////////////FUNCIONS PEL REGISTRE I LOGIN DEL USUARI


// OBTENIR DADES DEL USUARI
function getUserData($email){
  $usuari;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("Error:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $usuari = $resultado->fetch_assoc();
  }
  return $usuari;
}

//LOGIN AMB ADMISTRADOR
function isAdmin($email){
  $admin=false;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "select * from usuaris where email='$email'  and rols_id=1 ";
  if (!$resultado = $conn->query($sql)) {
    die("Error:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $admin=true;

  }
  return $admin;
}


//EXISTEIX L’USUARI
function userExists($email){
  $exists=false;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("Error:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $exists=true;
  }
  return $exists;
}

 //VALIDAR SI EL USUARI EXISTEIX EN LA BASE DE DADES
 function validaUsuari($email,$password){
  $resultat=false;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "select * from usuaris where email='$email' and password='$password' ";
  if (!$resultado = $conn->query($sql)) {
    die("Error:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $resultat=true;
  }

  return $resultat;

}

//COMPROVAR SI EL EMAIL EXISTEIX
function checkIfEmailExists($email){
  $resultat=false;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("Error:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $resultat=true;
  }
  return $resultat;
}


//ELIMINAR UN USUARI
function deleteUser($id){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "delete from usuaris where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;
}


//ACTUALIZAR  USUARI
function updateUser($nom,$email,$password,$id){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "update usuaris set nom='$nom',email='$email',password=md5('$password') where id=$id ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}

//AFEGIR USUARI
function addUser($nom,$email,$password){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "insert into usuaris (email,password,nom) values ('$email',md5('$password'),'$nom')  ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}
/**
 * return true si email existeix
 * return false si email no existeix
 */


//GENERAR CONSTRASEÑA
function generate_string( $strength = 16) {
  $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $input_length = strlen($input);
  $random_string = '';
  for($i = 0; $i < $strength; $i++) {
      $random_character = $input[mt_rand(0, $input_length - 1)];
      $random_string .= $random_character;
  }
  return $random_string;
}

//ACTUALIZAR CONTRASEÑA USUARI
function updatePasswordUser($email,$password){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "update usuaris set password=md5('$password') where email='$email' ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}
/**
 *
 * return true usuari i pasword correcte
 * return false cas contrari
 */



////////////FUNCIONS PELS PRODUCTES

//COMPROVAR EL PRODUCTE DEL USUARI
function ComprovarProducteUsuari($email,$idproducte){
  $retorno=false;
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    $sql = "select * from productes  where id=".$idproducte."   and usuari_id=".dadesUsuariID($email);
    if (!$resultado = $conn->query($sql)) {
      die("Error:".$conn->error);
    }
    if ($resultado->num_rows == 1) {
      $retorno=true;
    }
    return $retorno;
  }
  
  //ID DEL USUARI
  function dadesUsuariID($email){
    $usuari["id"]=0;
    $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    $sql = "select * from usuaris where email='$email'  ";
    if (!$resultado = $conn->query($sql)) {
      die("Error:".$conn->error);
    }
    if ($resultado->num_rows == 1) {
      $usuari = $resultado->fetch_assoc();
    }
    return $usuari["id"];
  }


//DADES DELS PRODUCTES
  function dadesProductes($id){
    $producte;
    $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
    $sql = "select * from productes where id=$id  ";
    if (!$resultado = $conn->query($sql)) {
      die("Error:".$conn->error);
    }
    if ($resultado->num_rows == 1) {
      $producte = $resultado->fetch_assoc();
    }
    return $producte;
  }
  

  //AFEGIR PRODUCTE
function afegirProducte($nom,$descripcio,$preu){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "insert into productes (nom,descripcio,preu,usuari_id) values ('$nom','$descripcio',$preu,".dadesUsuariID($_SESSION["login"]).")  ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}
//ELIMINAR UNA IMATGE
function eliminarImatge($id,$ruta){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "delete from imatges where id=$id ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  unlink($ruta);
  return true;
}

//ELIMINAR UN PRODUCTE
function eliminarProducte($id){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "delete from productes where id=$id ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}


//ACTUALIZAR  PRODUCTE
function actualitzarProducte($nom,$descripcio,$preu,$id){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "update productes set nom='$nom',descripcio='$descripcio',preu=$preu where id=$id ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}


//AFEGIR IMATGE A UN PRODUCTE
function afegirImatgeProducte($ruta,$nom,$idproducte){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "insert into imatges (nom,ruta,producte_id) values ('$nom','$ruta',$idproducte) ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }
  return true;
}


//ELIMINAR UN PRODUCTE DE UNA CATEGORIA
function eliminarProducteCategoria($cat,$prod){
  $conn = connectDB('localhost', 'nmartos', 'nmartos', 'nmartos_a5');
  $sql = "delete from categoria_producte where producte_id=$prod and categoria_id=$cat ";
  if (!$conn->query($sql)) {
    die("Error:".$conn->error);
  }

  return true;
}

?>
