<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title>Consulter un élève</title>
    </head>
    <body>
        <div class = "page_header">Consulter un élève</div>

        <div class = "page_content">
            Veuillez sélectionner l'élève à consulter ci-dessous : 
            <hr>
            <form method = "POST" action = "consulter_eleve.php">
                <select name = "ideleve">
                <?php
                    $dbhost = "tuxa.sme.utc";
                    $dbuser = "nf92a065";
                    $dbpass = "ghdLQ90Fv3fr";
                    $dbname = "nf92a065";

                    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "SELECT idEleve, nom, prenom FROM eleves";
                    //echo $query;
                    $result = mysqli_query($connect, $query);

                    while($row = mysqli_fetch_array($result)){
                        printf("<option value = %s>%s %s</option>", $row[0], $row[1], $row[2]);
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
