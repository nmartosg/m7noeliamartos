//exercici1:
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="view" content="width=device-width, initial-scale=1.0">
	<title>Exercici 1</title>
</head>
<body>
	<br>
	<?php
		$a1 = array( 'A','B','C','D');
		$a2 = array( 1,2,3,4,5,6,7);
		$a3 = array( 'Boli', 'Goma', 'Llapis', 'Escurça');
		$a = array( 'Lletres' => $a1, 'Números' => $a2, 'Materials Oficina' => $a3 );
		
		echo "<ul>";
		foreach ($a as $clau=>$valor){
			echo "<li>";
			echo "$clau: ";
			for ($i=0;$i<count($valor);$i++){
				if($i!=0)echo " ," ;
				echo $valor[$i];

			}
			echo "</li>";
		}
		echo "</ul>";

?>
</body>
</html>