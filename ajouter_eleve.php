<html>
	<head>
		<meta charset = "UTF-8">
		<title>Ajout d'élève </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<div class = "page_header"> Ajouter un élève </div>
		<div class = "page_content">
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
		else if (strlen($l_name) > 30 || strlen($f_name) > 30){
		
			printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. Un des noms est trop long.</div>");
		}
		else {
			$dbuser = "nf92a065";
			$dbhost = "tuxa.sme.utc";
			$dbpass = "ghdLQ90Fv3fr";
			$dbname = "nf92a065";

			$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
			mysqli_set_charset($connect,'utf8');
			
			$query = "select * from eleves WHERE `nom` = '".$l_name."' AND  `prenom` = '".$f_name."'";
			$result = mysqli_query($connect, $query);

			if (mysqli_num_rows($result) == 0){
				$query = 'insert into eleves (`idEleve`, `nom`, `prenom`,`dateNaissance`,`dateInscription`) values (NULL, "'.$l_name.'", "'.$f_name.'", "'.$bday.'", "'.$tddate.'")';
				echo $query.'<br>';
				mysqli_query($connect, $query);
				printf("Vous avez ajouté %s %s, né(e) le %s.", $f_name, $l_name, $bday);
			}
			else {
				printf("Il esiste déjà %s élèves inscrits avec ce nom. Voici leur données détaillées : <table>", mysqli_num_rows($result));
				echo "<tr><td>Nom</td><td>Prénom</td><td>Date de naissance</td><td>Date d'inscription</td>";
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row[1], $row[2], $row[3], $row[4]);
				}
				echo "</table> <br> Voulez vous l'insérer tout de même ? <form action = 'valider_eleve.php' method = 'POST'>";
				printf("<input type = 'hidden' value = '%s' name = 'f_name'>", $f_name);
				printf("<input type = 'hidden' value = '%s' name = 'l_name'>", $l_name);
				printf("<input type = 'hidden' value = '%s' name = 'bday'>", $bday);
				echo "<br><input type = 'submit' value = 'Oui' name = 'valider'>   <input type = 'submit' value = 'Non' name = 'valider'>";
			

				

			}
		mysqli_close($connect);
		}
	?>
	
	<br><a href = "ajout_eleve.html"> Retour </a> 
	</div>
	<div class = "page_footer"></div>
	</body>
</html>
