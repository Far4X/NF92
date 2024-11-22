<html>
    <head>
        <meta charset = "utf-8">
        <link href = "style.css" type = "text/css" rel = "stylesheet">
        <title> Désinscription à une séance </title>
    </head>
    <body>
        <div class = "page_header"> Désinscription à une séance </div>

        <div class = "page_content">
            <?php
            date_default_timezone_set("Europe/Paris");

            $dbhost = "tuxa.sme.utc";
            $dbuser = "nf92a065";
            $dbpass = "ghdLQ90Fv3fr";
            $dbname = "nf92a065";

            $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            $seance = $_POST("id_seance");
            if (empty(seance)){
                echo "Veuillez sélectionner une séance (seules les séances avec un ou plusieurs inscrit sont renseignées) : <hr>";
                echo "<form method = 'POST' action = 'desinscription_eleve'>";
                echo "<select size = '4' name = 'id_seance'>";
                 
                $query = "SELECT sc.idSeance, sc.DateSeance, th.Nom FROM seances AS sc WHERE sc.DateSeance >= ".date("Y\-m\-d")." AND 
            (SELECT COUNT(*) FROM inscriptions AS ins WHERE ins.idseance = sc.idSeance) > 0
                JOIN themes AS th ON th.idTheme = sc.IdTheme";
                echo $query;
                
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)){
                    printf("<option value = %s>Séance du %s sur le thème %s", $row[0], $row[1], $row[2]);
                }
                echo "</select><br><input type = 'submit' value = 'Envoyer'></form>";

            }

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
