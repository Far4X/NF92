<html>
	<head>
		<meta charset = "UTF-8">
		<Title> Ajout d'un thème </title>
		<link type = "text/css" rel = "stylesheet" href = "style.css">
	</head>
	<body>
		<h1>Ajouter un thème</h1>
		<p>
		Pour ajoute un thème, choisissez les composantes et cliquez sur ajouter.
		</p>
		<form action = "ajouter_seance.php" method = "POST">
		<br>
		<table border = > 
		
			<tr><td>Effectif de la séance:<td/><td> <input type = "int" name = "eff" required></td></tr>			
			<tr><td>Date de la séance:<td/><td> <input type = "date" name = "date" required></td></tr>			
			<tr><td>Thème : </td><td><select name = "id_theme">		
			<?php
				$dbhost = "tuxa.sme.utc";
				$dbuser = "nf92a065";
				$dbpass = "ghdLQ90Fv3fr";
				$dbname = "nf92a065";

				$connect = mysqli_connect($dbhost, $dbna)
			?>
		</table>
		<br>
		<input type = "Submit" value = "Ajouter">
		
		
	</body>
</html>
