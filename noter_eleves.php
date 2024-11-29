<html>
    <head>
        <title>Valider séance</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        <div class = "page_header">Valider séance</div>
        <div class = "page_content">
            <?php
                
            $dbhost = "tuxa.sme.utc";
            $dbuser = "nf92a065";
            $dbpass = "ghdLQ90Fv3fr";
            $dbname = "nf92a065";

            $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $num_el = $_POST["nbeleves"];
            $i = 0;
	    $seance = $_POST["idseance"];
	    //TODO: Repasser par l'id des élèves. Pas de compteur.
	    $query = "SELECT el.ideleve FROM eleves AS el JOIN inscriptions AS ins ON el.ideleve = ins.idEleve WHERE ins.idSeance = $seance";
            while ($i < $num_el){
                $el = "el".$i;
                $current_el_id = $_POST[$el];
                $current_el_nbfautes = $_POST[$el."note"];
                if ($current_el_nbfautes != -1){ //empty($current_el_nbfautes)
                    $note = (40 - $current_el_nbfautes)/2;
                    $query = "UPDATE inscriptions SET note = ".$note." WHERE `idSeance` = '".$seance."' AND `idEleve` = '".$current_el_id."'";
		    
		    mysqli_query($connect, $query);
		}

		$i++;
            }
	    printf("%s notes ont été entrées avec succès !", $i);
	?>
	    <br><a href = "validation_seance.php" target = "content">Valider une nouvelle séance </a><br>
	    <a href = "accueil.html" target = "content">Retour vers l'accueil</a>
        </div>

        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>

</html>
