<?php
		$mysqli = new MySQLi("localhost", "nmartos","nmartos", "nmartos_a5");
		if ($mysqli -> connect_errno) {
			die( "Error de la conexio amb la bade de dades: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
			//tot ok.
?>
