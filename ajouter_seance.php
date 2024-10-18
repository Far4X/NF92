<html>
	<head>
		<meta charset = "UTF-8">
		<title> Thème ajouté </title>
		<link rel = "stylesheet" href = "style.css" type = "text/css">
	</head>
	<body>
		<h1> Ajouter un thème </h1>

<?php
		if (!empty($_POST)){


			$name = $_POST["name"];
			printf("Requête analysée");
			if (empty($name)){
				printf("<div class = 'error'>Mauvaise requête. Cela n'a pas été traité.</div>");
			}
			else {
				printf("Vous avez ajouté le thème %s", $name);
			}
		}
	?>
	
	<br><a href = "ajout_theme.html"> Retour </a> 
	</body>
</html>
