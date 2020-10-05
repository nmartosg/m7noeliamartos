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
	$month=date("n");
	$year=date("Y");
	$diaActual=date("j");
	$diasetmana=date("w",mktime(0,0,0,$month,1,$year))+7;
	# ULTIM DIA DEL MES
	$ultimdiames=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
	$meses=array(1=>"GENER", "FEBRER", "MARÇ", "ABRIL", "MAIG", "JUNY", "JULIOL", "AGOST", "SETEMBRE", "OCTUBRE", "NOVEMBRE", "DECEMBRE");
	?>

<table id="calendari">
	<caption><?php echo $meses[$month]." ".$year?></caption>
	<tr>
		<th>DILLUNS</th><th>DIMARTS</th><th>DIMECRES</th><th>DIJOUS</th>
		<th>DIVENDRES</th><th>DISSABTE</th><th>DIUMENGE</th>
	</tr>
	<tr bgcolor="#000000">
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
