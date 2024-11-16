<html>
	<head>
		<meta charset = "UTF-8">
		<Title> Ajout d'une séance </title>
		<link type = "text/css" rel = "stylesheet" href = "style.css">
	</head>
	<body>
		<div class = "page_header">Ajouter une séance</div>
		<div class = "page_content">
		<p>
		Pour ajoute une séance, choisissez les composantes et cliquez sur ajouter.
		</p>
		<form action = "ajouter_seance.php" method = "POST">
		
		<table border = 0> 
		
			<tr><td>Effectif de la séance :<td/><td><input type = "number" min = "1" value = "1" name = "eff" required></td></tr>			
			<tr><td>Date de la séance : <td/><td><input type = "date" name = "date" required></td></tr>			
			<tr><td>Thème : </td><td></td><td><select name = "id_theme" >	
			<?php
				$dbhost = "tuxa.sme.utc";
				$dbuser = "nf92a065";
				$dbpass = "ghdLQ90Fv3fr";
				$dbname = "nf92a065";

				$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");

				mysqli_set_charset($connect, 'utf8');
				$result = mysqli_query($connect, "SELECT * FROM themes");
				
				
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					if (!$row[2]){
						echo "<option value = ".$row[0].">".$row[1]."</option>"; 
					}
				
				}

				$query = "select * from seances as s1 join seances as s2 where s1.DateSeance = s2.DateSeance and s1.idTheme = s2.idTheme and s1.idSeance < s2.idSeance";

				$result = mysqli_query($connect, $query);
				while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					
						printf("<br>Conflit : %s %s", $row[0], $row[3]);		
					
				}
				mysqli_close($connect)


			?>
		</select></td></tr>
		</table>
		<br>
		
		<input type = "Submit" value = "Ajouter">
		</div>
		<div class = "page_footer"></div>
		
	</body>
</html>
