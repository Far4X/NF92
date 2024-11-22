<html>
	<head>
		<meta charset = "utf-8">
		<title>Valider séance</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css">
	</head>
	<body>
		<div class = "page_header">Valider une séance</div>
		<div class = "page_content">
			Pour noter une séance, veuillez la sélectionner ci-dessous : 
			<br>
			Les séances notées en rouge comportent des notes non complétées.
			<hr>
			<br>
			<?php
				$dbhost = "tuxa.sme.utc";
				$dbuser = "nf92a065";
				$dbpass = "ghdLQ90Fv3fr";
				$dbname = "nf92a065";

				$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				date_default_timezone_set("Europe/Paris");
				$tddate = date("Y\-m\-d");

            
				$query = "SELECT sc.idSeance, sc.DateSeance, th.Nom FROM seances AS sc  
				       JOIN themes AS th ON sc.IdTheme = th.idTheme  WHERE sc.DateSeance < '".$tddate."' ORDER BY sc.DateSeance DESC";
                echo $query;
                
                $result = mysqli_query($connect, $query); //Todo : mettre en rouge les séances pas complètement notées
				echo "<form method = 'POST' action = 'valider_seance.php'>";	
				echo "<select name = 'sc' size = '10'>";

				while ($row = mysqli_fetch_array($result)) {
					$query = "SELECT * FROM inscriptions AS ins 
						JOIN seances AS sc ON sc.idSeance = ins.idseance
						WHERE sc.idSeance = '".$row[0]."' AND ins.note = '-1'";
					;		
					$result2 = mysqli_query($connect, $query);
					if (mysqli_num_rows($result2)>0){
						printf("<option value = '%s' style = 'color : #FF0000!important;'> Séance du %s sur le thème %s", $row[0], $row[1], $row[2]);
					}
					else {
						printf("<option value = '%s'> Séance du %s sur le thème %s", $row[0], $row[1], $row[2]);
					}
				}
				echo"</select>";
				echo "<br><br><input type = 'submit' value = 'Entrer des notes'></form>";
				mysqli_close($connect);
				?>	


		</div>
		<div class = "page_footer">
			<?php
				date_default_timezone_set("Europe/Paris");
				printf("Page générée le %s", date("Y\-m\-d"));
			?>
		</div>
	</body>
</html>
