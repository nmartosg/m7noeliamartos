<?php
//DEFINIM ELS VALORS DEL MES/ANY/DIACTUAL
$month=date("n");
$year=date("Y");
$diaActual=date("j");
 

$diasetmana=date("w",mktime(0,0,0,$month,1,$year))+7;
# Obtenemos el ultimo dia del mes
$ultimdiames=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array(1=>"GENER", "FEBRER", "MARÇ", "ABRIL", "MAIG", "JUNY", "JULIOL",
"AGOST", "SETEMBRE", "OCTUBRE", "NOVEMBRE", "DECEMBRE");
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Calendario DAW2</title>
	<meta charset="utf-8">
	<style>
		#calendari {

			font-size:40px;
		}
		#calendari caption {

			text-align:center;
			padding:5px 100px;
			background-color: green;
			color:black;
			font-weight:bold;
		}
		#calendari th {
			background-color:black;
			color:#fff;
			width:40px;
		}
		#calendari td {
			text-align:right;
			padding:3px 25px;
			background-color:white;
		}
		#calendari .hoy {
			background-color:blue;
		}
	</style>
</head>
 
<body>
<table id="calendari">
	<caption><?php echo $meses[$month]." ".$year?></caption>
	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr bgcolor="black">
		<?php
		$last_cell=$diasetmana+$ultimdiames;

		for($i=1;$i<=42;$i++)
		{
			if($i==$diasetmana)
			{
				// DIA EN QUE COMEÇA LA SETMANA
				$day=1;
			}
			if($i<$diasetmana || $i>=$last_cell)
			{
				echo "<td>&nbsp;</td>";
			}else{
				// DIA ACTUAL EN EL QUE ESTEM 
				if($day==$diaActual)
					echo "<td class='hoy'>$day</td>";
				else
					echo "<td>$day</td>";
				$day++;
			}
			// CORRESPON A LA NOVA COLUMNA JA QUE HEM ACABAT LA SETMANA
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
</body>
</html>