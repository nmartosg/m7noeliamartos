<?php
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    //amb aquest error comprovo que tot es selecciona o es omple.
    print_r($_FILES);
    $error="";
    $dir_subida = '';
    $fichero_subido = $dir_subida . basename($_FILES['myfile']['name']);
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $fichero_subido)) {
       
    } else {
        $error.="Error al pujat el fitxer.";
    }
    if (empty($_REQUEST["mytext"])){
        $error.="El text és obligatori.<br>";
    }
    if (!isset($_REQUEST["myradio"])) {
        $error.="El radio és obligatori.<br>";
    }
    if (!isset($_REQUEST["mycheckbox"])) {
        $error.="El checkbox és obligatori.<br>";
    }
    if ($_REQUEST["myselect"]==0) {
        $error.="El select és obligatori.<br>";
    }
    if (empty($_REQUEST["mytextarea"])) {
        $error.="El text és obligatori.<br>";
    }
    if ($error!="") {
        echo $error;
    }else{
        //printa les coses introduides.
        echo "El text resultat és: "; print_r($_REQUEST["mytext"]);
        echo "<br>El RADIOBUTTON és: "; print_r($_REQUEST["myradio"]);
        echo "<br>Els CHECKBOX marcats són: "; print_r($_REQUEST["mycheckbox"]);
        echo "<br>L'item seleccionat és: "; print_r($_REQUEST["myselect"]);
        echo "<br>El teu text escrit és: "; print_r($_REQUEST["mytextarea"]);
        echo "<br La imatge seleccionada és"; print_r($_FILES);
        //Per printar la imatge o qualsevol document l'executu de tal forma (semblant a l'exemple)
        
    }
}else{
    /*
    if($eror!=""){
        echo $error:
    }else

    print_r($_FILES);
    echo "<br>";
    $error="";
    $ficheros="";
    if($_FILES["myfile"]["name"][0]!=null){
        for ($i=0;$i<count($_FILES["myfile"]["name"]);$i++){
            $dir_subida= ' ';
            $fichero_subida = $dir_subida . basename($_FILES['myfile']['name']);
            if (move_uploaded_file($_FILES["myfile"]['tmp_name'],  $fichero_subida){
                $ficheros.="<a href=\"$fichero_subida\">Fitxer</a>";            
            }else{
            $error.="<br>Error al pujar el fitxer.<br>";
            }
        }

    }else {
        $error.="<br>El fi és obligatori<br>";
    }
    */

    
//Printa el formulari
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Formulari Noelia Martos</title>
</head>
<body>
<div style="margin: 30px 10%;">
<h3>FORMULARI</h3>
<form enctype="multipart/form-data" action="formulari.php" method="post" id="myform" name="myform" enctype="multipart/form-data">
    <label>Text</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />
    <input type="radio" name="myradio" value="1" /> Primer radio
    <input type="radio" checked="checked" name="myradio" value="2" /> Segon radio<br /><br />
    <input type="checkbox" name="mycheckbox[]" value="1" /> Primer checkbox
    <input type="checkbox" checked="checked" name="mycheckbox[]" value="2" /> Segon checkbox<br /><br />
    <label>Selecciona </label>
    <select name="myselect" id="">
        <option value="0" selected="selected">Selecciona una opció</option>
        <option value="1">item 1</option>
        <option value="2">item 2</option>
    </select><br /><br />
    <label>Introdueix text: </label>
    <textarea name="mytextarea" id="" rows="3" cols="30">   
    </textarea> <br /><br />
    <label for="myfile">Arxiu  </label><input type="myfile" name="myfile" >
    </br> </br>
    <button id="mysubmit" type="submit">Enviar</button><br /><br />
</form>
</div>
</body>
</html>
<?php   
}
?>