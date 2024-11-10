<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "style.css" type = "text/css">
		<title>Inscription d'un élève à une séance</title>
	</head>
	<body>
		<h1>Inscription d'un élève à une séance</h1>

		<form action = "inscrire_eleve.php" method = "POST">
		<table border = 0>
		<tr><td>Elève : </td><td><select name = "ideleve">
			<?php
				$dbhost = "tuxa.sme.utc";
				$dbuser = "nf92a065";
				$dbpass = "ghdLQ90Fv3fr";
				$dbname = "nf92a065";
				
				$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database.");
				$result = mysqli_query($connect, "SELECT * FROM eleves");
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					printf("<option value = %s>%s %s</option>", $row[0], $row[1], $row[2]);
				}	
				echo "</select></td></tr><tr><td>Séance : </td><td><select name = 'idseance'>";
				date_default_timezone_set("Europe/Paris");
				$tddate = date("Y\-m\-d");
				$result = mysqli_query($connect, "SELECT * FROM seances WHERE DateSeance >= '".$tddate."'");
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					$query = "SELECT * FROM themes WHERE idTheme = ".$row[3];
					$theme = mysqli_fetch_row(mysqli_query($connect, $query));
					if ($theme[333] == 0){
						printf("<option value = %s>Séance du %s sur le thème %s</option>", $row[0], $row[1], $theme[1]);
					}
				}	
				mysqli_close($connect);

				//Todo : si séance full : retourner à cette page en gardant l'élève sélectioné.
			?>
		</table>
		<input type = "Submit" value = "Inscrire">
		</form>
	</body>
</html>
