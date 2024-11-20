<html>
    <head>
        <title> Supprimer un thème </title>
        <link rel = "style.css" type = "text/css" href = "style.css">
        <meta charset = "utf-8">
    </head>
    <body>
        <div class = "page_header"> Supprimer un thème </div>
        <div class = "page_content"> 
            <?php
                $to_supress = $_POST["target"];

                $dbhost = "tuxa.sme.utc";
                $dbuser = "nf92a065";
                $dbpass = "ghdLQ90Fv3fr";
                $dbname = "nf92a065";
                
                $query = "UPDATE themes SET `Supprime` = '1' WHERE idTheme = $to_supress";
                echo $query;
                $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                mysqli_query($connect, $query);

            
                
            ?>  
            Thème suppimé avec succès ! <br>
            <a href = "suppression_theme.php">Supprimer un autre thème</a><br>
            <a href = "accueil.html"> Retour à l'accueil</a>
        </div>
        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>
</html>
