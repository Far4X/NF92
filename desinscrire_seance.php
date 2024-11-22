<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title> Désinscrire un élève d'une séance</title>
    </head>
    <body>
        <div class = "page_header"> Désinscrire un élève d'une séance</div>
        <div class = "page_content"> 
            <?php
                $dbhost = "tuxa.sme.utc";
                $dbuser = "nf92a065";
                $dbpass = "ghdLQ90Fv3fr";
                $dbname = "nf92a065";

                $id_eleve = $_POST["id_eleve"];
                $id_seance = $_POST["id_seance"];

                $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                $query = "SELECT nom, prenom FROM eleves WHERE idEleve = '$id_eleve'";
                //echo $query;
                $eleve = mysqli_fetch_array(mysqli_query($connect, $query));
                $query = "SELECT DateSeance FROM seances WHERE idSeance = '$id_seance'";
                //echo $query;

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
