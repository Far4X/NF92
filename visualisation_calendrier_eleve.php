<html>
    <head>
        <meta charset = "utf-8">
        <title>Visualiser le calendrier d'un élève</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        <div class = "page_header">Visualiser le calendrier d'un élève</div>
        <div class = "page_content">

            Choisissez l'élève dont vous voulez visualiser le calendrier :<hr>
            <form method = "POST" action = "visualiser_calendrier.php">
                <select size = '10' name = 'id_eleve'>
                    <?php
                        $dbhost = "tuxa.sme.utc";
                        $dbuser = "nf92a065";
                        $dbpass = "ghdLQ90Fv3fr";
                        $dbname = "nf92a065";

                        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                        $query = "SELECT idEleve, nom, prenom  FROM eleves";
                        $result = mysqli_query($connect, $query);

                        while($row = mysqli_fetch_array($result)){
                            printf("<select value = '%s'>%s %s</option>", $row[0], $row[1], $row[2]);
                        }
                        mysqli_close($connect);
                    ?>
                </select>
                <input type = "submit" value = "Envoyer">
            </form>
        </div>
        <div class = "page_footer">
            <?php
            date_default_timezone_set("Europe/Paris");
            printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>
</html>
