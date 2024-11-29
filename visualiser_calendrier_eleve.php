<html>
    <head>
        <meta charset = "utf-8">
        <title>Visualiser le calendrier d'un élève</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        <script link = "script.js"></script>
        <div class = "page_header"> Visualiser le calendrier d'un élève</div>
        <div class = "page_content">
            Voici le calendrier de l'élève sélectionné : <hr>
            <?php
            $dbhost = "tuxa.sme.utc";
            $dbuser = "nf92a065";
            $dbpass = "ghdLQ90Fv3fr";
            $dbname = "nf92a065";

            date_default_timezone_set("Europe/Paris");

            $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $id_eleve = $_POST["id_eleve"];
            $query = "SELECT ins.note, sc.DateSeance, th.Nom FROM inscriptions AS ins 
                JOIN seances AS sc ON ins.idseance = sc.idSeance
                JOIN themes AS th ON th.idTheme = sc.idTheme
                    WHERE sc.DateSeance < '".date("Y\-m\-d")."' AND ins.ideleve = $id_eleve ORDER BY sc.DateSeance ASC";
            //echo $query;
            echo "Séances passées : ";
            //TODO: mettre moyenne des séances 
	    $result = mysqli_query($connect, $query);
	    if (mysqli_num_rows($result) > 0){
	        echo "<table border = 0><tr><td>Séance</td><td>Note</td></tr>";
		    while ($row = mysqli_fetch_array($result)){
		printf("<tr><td>Séance du %s, sur le thème %s</td><td>%s</td></tr>", $row[1], $row[2], ($row[0]== '-1' ? "Pas encore de note" : $row[0]));
		}
		echo "</table>";
	    }
	    else {
		    printf("L'élève n'a encore fait aucune séance !");
	    }


            echo "<hr>Séance futures : <br>";
            $query = "SELECT sc.DateSeance, th.Nom FROM inscriptions AS ins 
                JOIN seances AS sc ON ins.idseance = sc.idSeance
                JOIN themes AS th ON th.idTheme = sc.idTheme
		    WHERE sc.DateSeance >= '".date("Y\-m\-d")."' AND ins.ideleve = $id_eleve ORDER BY sc.DateSeance ASC";
	    //echo $query;

            $result = mysqli_query($connect, $query);
	    if (mysqli_num_rows($result) == 0){
	    	printf("L'élève n'est inscrit à aucune séance dans le futur, pour l'instant !");
	    }
            while ($row = mysqli_fetch_array($result)){
                printf("Séance du %s, sur le thème %s<br>", $row[0], $row[1]);
	    }

            mysqli_close($connect);
            ?>
            <br><a href = "visualisation_calendrier_eleve.php"> Visualiser un autre calendrier d'élève </a><br>
            <a href = "accueil.html" target = "content" onclick = "changeColors('acc_div')">Retour à l'accueil</a>
        </div>
        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>
</html>
