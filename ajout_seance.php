<html>
	<head>
		<meta charset = "UTF-8">
		<Title> Ajout d'un séance </title>
		<link type = "text/css" rel = "stylesheet" href = "style.css">
	</head>
	<body>
		<h1>Ajouter un séance</h1>
		<p>
		Pour ajoute un séance, choisissez les composantes et cliquez sur ajouter.
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
				
				mysqli_close($connect)


			?>
		</select></td></tr>
		</table>
		<br>
		
		<input type = "Submit" value = "Ajouter">
		
		
	</body>
</html>
