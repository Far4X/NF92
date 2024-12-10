<html>
    <head>
        <title> Supprimer un thème </title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <meta charset = "utf-8">
    </head>
    <body>
        <div class = "page_header"> Supprimer un thème </div>

        <script src = "script.js" defer></script>
        <div class = "page_content"> 
            <?php
                $to_supress = $_POST["target"];

                $dbhost = "tuxa.sme.utc";
                $dbuser = "nf92a065";
                $dbpass = "ghdLQ90Fv3fr";
                $dbname = "nf92a065";


                $query = "UPDATE themes SET `Supprime` = '1' WHERE idTheme = $to_supress";
                //echo $query;
                $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


                mysqli_query($connect, $query);
                date_default_timezone_set("Europe/Paris");

                $query = "SELECT idSeance FROM seances WHERE DateSeance >= ".date("Y\-m\-d")." AND idTheme = '$to_supress'";
                echo $query;
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)){
                    $query = "DELETE FROM inscription WHERE idseance = $row[0]";
                    mysqli_query($connect, $query);
                    $query = "DELETE FROM seances WHERE idSeance = $row[0]";
                    mysqli_query($connect, $query);
                    

                }

                mysqli_close($connect);
            ?>  
            Thème et séances futures liées à ce thème supprimés avec succès ! <br><hr>
            <a href = "suppression_theme.php">Supprimer un autre thème</a><br>
            <a href = "accueil.html" onclick = "changeColors('acc_div')"> Retour à l'accueil</a>
        </div>
        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>
</html>
