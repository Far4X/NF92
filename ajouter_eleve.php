<html>
	<head>
		<meta charset = "UTF-8">
		<title> Elève ajouté </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<h1> Ajouter un élève </h1>

		<?php
		$l_name = $_POST["l_name"];
		$f_name = $_POST["f_name"];
		$bday = $_POST["date_bd"];
		date_default_timezone_set('Europe/Paris');
		$tddate = date("Y\-m\-d");
		printf("Requête analysée le %s <br><br>", $tddate);
		if (empty($l_name) || empty($f_name) || empty($bday)){
			printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité.</div>");
		}
		else {
			$dbuser = "nf92a065";
			$dbhost = "tuxa.sme.utc";
			$dbpass = "ghdLQ90Fv3fr";
			$dbname = "nf92a065";

			$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
			mysqli_set_charset($connect,'utf8');
			
			$query = 'insert into eleves (`idEleve`, `nom`, `prenom`,`dateNaissance`,`dateInscription`) values (NULL, "'.$l_name.'", "'.$f_name.'", "'.$bday.'", "'.$tddate.'")';
			echo $query.'<br>';
			mysqli_query($connect, $query);
			printf("Vous avez ajouté %s %s, né(e) le %s.", $f_name, $l_name, $bday);
		}
	?>
	
	<br><a href = "ajout_eleve.html"> Retour </a> 
	</body>
</html>
