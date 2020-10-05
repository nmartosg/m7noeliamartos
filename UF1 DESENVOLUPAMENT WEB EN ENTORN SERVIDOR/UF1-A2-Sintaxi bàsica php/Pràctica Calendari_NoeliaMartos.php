<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="view" content="width=device-width, initial-scale=1.0">
	<title>CALENDARI</title>

	<style>
		#calendari {
			font-size:15px;
		}
		#calendari .hoy {
			background-color:#04F8CD;
		}
		#calendari caption {
			text-align:center;
			padding:5px 100px;
			background-color: green;
			color:white;
			font-weight:bold;
		}
		#calendari th {
			background-color:black;
			color:#fff;
			width:1px;
		}
		#calendari td {
			text-align:right;
			padding:3px 25px;
			background-color:white;
		}
	</style>
</head>
 
<body>

	<?php
	//DEFINIM ELS VALORS DEL MES/ANY/DIACTUAL
	$mes=date("n");
	$año=date("Y");
	$hoy=date("j");
	$diasetmana=date("w",mktime(0,0,0,$mes,1,$año))+7;
	# ULTIM DIA DEL MES
	$ultimdiames=date("d",(mktime(0,0,0,$mes+1,1,$año)-1));
	$meses=array(1=>"GENER", "FEBRER", "MARÇ", "ABRIL", "MAIG", "JUNY", "JULIOL", "AGOST", "SETEMBRE", "OCTUBRE", "NOVEMBRE", "DECEMBRE");
	?>

<table id="calendari">
	<caption><?php echo $meses[$mes]." ".$año?></caption>
	<tr>
		<th>DILLUNS</th><th>DIMARTS</th><th>DIMECRES</th><th>DIJOUS</th>
		<th>DIVENDRES</th><th>DISSABTE</th><th>DIUMENGE</th>
	</tr>
	<tr>
		<?php
		$ultimacelda=$diasetmana+$ultimdiames;
		for($i=1;$i<=42;$i++){
			if($i==$diasetmana){
				// DIA EN QUE COMEÇA LA SETMANA
				$dia=1;
			}
			if($i<$diasetmana || $i>=$ultimacelda){
				echo "<td>&nbsp;</td>";
			}
			else{
				// DIA ACTUAL EN EL QUE ESTEM 
				if($dia==$hoy)
					echo "<td class='hoy'>$dia</td>";
				else
					echo "<td>$dia</td>";
				$dia++;
			}
			// CORRESPON A LA NOVA COLUMNA JA QUE HEM ACABAT LA SETMANA
			if($i%7==0){
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
</body>
</html>
