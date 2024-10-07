<html>
	<head>
		<meta charset = "UTF-8">
		<title> Elève ajouté </title>
		<link rel = "stylesheet" href = "ajout_eleve.css" type = "text/css">
	</head>
	<body>
		<h1> Ajouter un élève </h1>

		<?php
		$l_name = $_POST["l_name"];
		$f_name = $_POST["f_name"];
		$bday = $_POST["date_bd"];
		date_default_timezone_set('Europe/Paris');
		$tddate = date("Y\-m\-d");
		printf("Requête analysé le %s <br><br>", $tddate);
		if (empty($l_name) || empty($f_name) || empty($bday)){
			printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité.</div>");
		}
		else {
			printf("Vous avez ajouté %s %s, né(e) le %s. Traitement encore non implémenté <br>", $f_name, $l_name, $bday);
		}
	?>
	
	<br><a href = "ajout_eleve.html"> Retour </a> 
	</body>
</html>
