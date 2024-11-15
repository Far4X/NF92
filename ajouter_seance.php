<html>
	<head>
		<meta charset = "UTF-8">
		<title> Thème ajouté </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<div class = "page_header"> Ajouter une séance </div>
		<div class = "page_content">
		<?php
		if (!empty($_POST)){


			$eff = $_POST["eff"];
			$date = $_POST["date"];
			$theme = $_POST["id_theme"];
			date_default_timezone_set('Europe/Paris');
			$tddate = date("Y\-m\-d");
			printf("Requête analysée.</br>");
			if (empty($eff)){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. L'effectif est vide.</div>");
			}
			else if ($eff < 1){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. L'effectif est négatif ou nul.</div>");	
			}
			else if (empty($date)){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. La date est vide. </div>");
			}
			else if ($date < $tddate){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. La date est antérieure à la date actuelle.</div>");
			}
			else if (empty($theme)){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. Le thème n'a pas été sélectionné. </div>");
			}
			else {
				$dbhost = "tuxa.sme.utc";
				$dbuser = "nf92a065";
				$dbpass = "ghdLQ90Fv3fr";
				$dbname = "nf92a065";

				$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");

				mysqli_set_charset($connect, 'utf8');
				$result = mysqli_query($connect, "SELECT * FROM seances WHERE `DateSeance` = '".$date."' AND `Idtheme` = '".$theme."'");

				if (mysqli_fetch_array($result, MYSQLI_NUM)){
					printf("Impossible d'ajouter la séance, une sur le même thème et le même jour est déjà programmée.");
				}
				else {
					$query = "insert into seances (`idseance`, `DateSeance`, `EffMax`, `Idtheme`) values (NULL, '".$date."', '".$eff."', '".$theme."')";
					mysqli_query($connect, $query);
					printf("Vous avez ajouté la séance  %s %s", $date, $tddate);
				
				}
				mysqli_close($connect);
			}
	
		}
	?>
	
	<br><a href = "ajout_seance.php"> Retour </a>
	</div>
	<div class = "page_footer"></div> 
	</body>
</html>
