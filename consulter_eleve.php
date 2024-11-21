<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title>Consulter un élève</title>
    </head>
    <body>
        <div class = "page_header">Consulter un élève</div>

        <div class = "page_content">
            Voici les informations sur l'élève sélectionné :
            <hr>
            <form method = "POST" action = "consulter_eleve.php">
                
                <?php
                    $dbhost = "tuxa.sme.utc";
                    $dbuser = "nf92a065";
                    $dbpass = "ghdLQ90Fv3fr";
                    $dbname = "nf92a065";

                    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $idEleve = $_POST["ideleve"];
                    $query = "SELECT * FROM eleves WHERE idEleve = $idEleve";
                    $result = mysqli_query($connect, $query);

                    if ($row = mysqli_fetch_array($result)){
                        printf("%s %s, inscrit le %s, né le %s", row[1], row[2], row[4], row[3]);
                    }

                    mysqli_close($connect);
                ?>
                </select>
                <input type = "submit" value = "Sélectionner">
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
