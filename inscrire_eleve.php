<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "style.css" type = "text/css">
		<title>Inscription d'un élève à une séance</title>
	</head>
	<body>
		<h1>Inscription d'un élève à une séance</h1>
		<?php
			$dbhost = "tuxa.sme.utc";
			$dbuser = "nf92a065";
			$dbpass = "ghdLQ90Fv3fr";
			$dbname = "nf92a065";
			
			$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
			$ideleve = $_POST["ideleve"];
			$idseance = $_POST["idseance"];	
			$query = "SELECT * FROM inscriptions WHERE idseance = '".$idseance."' AND ideleve = '".$ideleve."'";
			$result = mysqli_query($connect, $query);
			if (mysqli_num_rows($result) == 0){
				$query = "SELECT capacite FROM seance WHERE idSeance = '".$idseance."'";
				$capa = $mysqli_fect_row(mysqli_query($connect, $query));


				$query = "SELECT COUNT(*) FROM eleves el
						JOIN inscriptions insc ON insc.idEleve = el.idEleve
						JOIN seance se ON insc.idSeance = se.idSeance
						WHERE se.idSeance = '".$idseance."'";
				if (mysqli_fetch_row(mysqli_query($connect, $query))[0] < $capa){
				
					$query = "INSERT INTO inscriptions (`idseance`, `ideleve`, `note`) VALUES ('".$ideleve."', '".$idseance."', -1)";
					printf("L'élève a bien été ajouté à la séance"); //Si tps : mettre nom el et th + date sc + check si max capa a déjà été atteint
				}
				else {
					printf("</div class='error'>La capacité maximale de cette séance a dékà été atteinte !</div>");
				}

			}
			else {
				printf("L'élève fait déjà partie de cette seance !");
			}

			mysqli_close($connect);	
		?>
	</body>
</html>