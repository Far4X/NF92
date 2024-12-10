<html>
    <head>
        <meta charset = "utf-8">
        <title>Valider une séance</title>
        <link rel = "stylesheet" href = "style.css" type = "text/css">
    </head>
    <body>
        <!-- Pas de RQST si pas chgt note -->
        
        <script src = "script.js" defer></script>
        <div class = "page_header">Valider une séance</div>
        <div class = "page_content">
            <form method = "POST" action = "noter_eleves.php">
                <?php
                $seance = $_POST["sc"];
                echo '<input type = "hidden" name = "seance" value = "'.$seance.'">';
                $dbhost = "tuxa.sme.utc";
                $dbuser = "nf92a065";
                $dbpass = "ghdLQ90Fv3fr";
                $dbname = "nf92a065";

                $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                $query = "SELECT el.nom, el.idEleve, el.prenom, ins.note FROM eleves AS el
                        JOIN inscription AS ins ON el.idEleve = ins.ideleve WHERE ins.idSeance = '".$seance."'";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) == 0){
                    printf("<div class = 'error'>Aucun élève inscrit à cette séance</div>");
                }
                else {
                    echo "<form method = 'POST' action = 'noter_eleves'>";
                    echo "<table border = '0'>";
                    echo "<tr><td>Nom</td><td>Prénom</td><td>Nombre de fautes</td></tr>";


                    printf("<input type = 'hidden' name = 'idseance' value = '%s'>", $seance);
                    while ($row = mysqli_fetch_array($result)){
                        printf("<tr><td>%s</td><td>%s</td><td><input type = 'number' name = 'el%snote' value = '%s' max = '40' min = '0'></td></tr>", $row[0], $row[2], $row[1], ($row[3] != -1) ? (40 - 2*$row[3]) : "");
                        
                    }
                    echo "</table><br><input type = 'submit' value = 'Envoyer'>";
                } 
                mysqli_close($connect);
                ?>

            </form>
		<br>
	    <a href = "accueil.html" target = "content" onclick = "changeColors('acc_div')">Retour à l'acceuil</a>
            
	    <br>
        <a href = "validation_seance.php" target = "content">Valider une autre séance</a>

        </div>
        <div class = "page_footer">
            <?php
            date_default_timezone_set("Europe/Paris");
            printf("Page générée le %s", date("Y\-m\-d"));
            ?>
            
        </div>

    </body>
</html>
