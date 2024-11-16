<html>
	<head>
		<meta charset = "UTF-8">
		<title> Validation élève </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<div class = "page_header"> Ajouter un élève </div>
		<div class = "page_content">		
		<?php
		if ($_POST["valider"] == "Oui"){
			
			$l_name = $_POST["l_name"];
			$f_name = $_POST["f_name"];
			$bday = $_POST["bday"];

			$dbuser = "nf92a065";
			$dbhost = "tuxa.sme.utc";
			$dbpass = "ghdLQ90Fv3fr";
			$dbname = "nf92a065";

			$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
			date_default_timezone_set("Europe/Paris");
			$query = "insert into eleves (`idEleve`, `nom`, `prenom`, `dateNaissance`, `dateInscription`) values (NULL, '".$l_name."', '".$f_name."', '".$bday."', '".date("Y\-m\-d")."');";
			mysqli_query($connect, $query);
			printf("<div class=infobox>L'élève %s %s a bien été ajouté.</div>", $f_name, $l_name);


		}
		else {
			printf("<div class=infobox>L'élève n'a pas été ajouté en doublon.</div>");
		
		}

?>

	</div>
	<div class = "page_footer"></div>
	</body>
</html>
