<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "style.css" type = "text/css">
		<title>Inscription d'un élève à une séance</title>
	</head>
	<body>
		<div class = "page_header">Inscription d'un élève à une séance</div>
		<div class = "page_content">			
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
				$query = "SELECT EffMax FROM seances WHERE idSeance = '".$idseance."'";
				$capa = mysqli_fetch_row(mysqli_query($connect, $query))[0];


				$query = "SELECT COUNT(*) FROM eleves el
						JOIN inscriptions insc ON insc.idEleve = el.idEleve
						JOIN seances se ON insc.idSeance = se.idSeance
						WHERE se.idSeance = '".$idseance."'";
				

				if (mysqli_fetch_row(mysqli_query($connect, $query))[0]< $capa){

					$query = "INSERT INTO inscriptions (`idseance`, `ideleve`, `note`) VALUES ('".$idseance."', '".$ideleve."', -1)";
					mysqli_query($connect, $query);
					printf("L'élève a bien été ajouté à la séance"); //Si tps : mettre nom el et th + date sc + check si max capa a déjà été atteint
				}
				else {
					printf("<div class='error'>La capacité maximale de cette séance a déjà été atteinte !</div>");
				}

			}
			else {
				printf("L'élève fait déjà partie de cette seance !");
			}

			mysqli_close($connect);	
?>
			<br><a href = "inscrire_eleve.php" target = "content">Inscrire un nouvel élève</a>  
			<br><a href = "accueil.html" target = "content">Retour à l'accueil</a>  
		</div>
		<div class = "page_footer">
			<?php
				date_default_timezone_set("Europe/Paris");
				printf("Page générée le %s", date("Y\-m\-d"));
			?>		
		</div>
	</body>
</html>
