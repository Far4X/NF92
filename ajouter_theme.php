<html>
	<head>
		<meta charset = "UTF-8">
		<title> Thème ajouté </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<div class = "page_header"> Ajouter un thème </div>
		<div class = "page_content">
		<?php
		$name = $_POST["name"];
        $desc = $_POST["desc"];

        
        if (strpos($name, '"') || strpos($name, '<') ||strpos($name, "'")){
            printf("<div class = 'error'>Caratère non autorisé dans le nom");
            die();
            
        }

        if (strpos($desc, '"') || strpos($desc, '<') ||strpos($desc, "'")){
            printf("<div class = 'error'>Caratère non autorisé dans le nom");
            die();
        }


		printf("Requête analysée");
		if (empty($name)){
			printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité.</div>");
		}
		else if (strlen($name) > 30){

			printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité. Le nom est trop long.</div>");
		}
		else {
			$dbhost = "tuxa.sme.utc";
			$dbuser = "nf92a065";
			$dbpass = "ghdLQ90Fv3fr";
			$dbname = "nf92a065";

            $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
            //<!--TODO :  si un thème déjà ajouté mais supprimé entré : le réactiver-->

			$query = 'insert into themes (`idTheme`, `Nom`, `Supprime`, `Descriptif`) values (NULL, "'.$name.'", 0, "'.$desc.'");';
			$rep = mysqli_query($connect, $query);
			printf("Vous avez ajouté le thème %s", $name);
			mysqli_close($connect);
		}
	?>
	
		<br><a href = "ajout_theme.html"> Retour </a> 
		</div>
		<div class = "page_footer"></div>
	</body>
</html>
