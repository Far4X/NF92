<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title> Désinscrire un élève d'une séance</title>
    </head>
    <body>
	<div class = "page_header"> Désinscrire un élève d'une séance</div>
	<script src = "script.js" defer></script>
        <div class = "page_content"> 
            <?php
                $dbhost = "tuxa.sme.utc";
                $dbuser = "nf92a065";
                $dbpass = "ghdLQ90Fv3fr";
                $dbname = "nf92a065";

                $id_eleve = $_POST["id_eleve"];
                $id_seance = $_POST["id_seance"];

                $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to reach database");
                $query = "SELECT nom, prenom FROM eleves WHERE idEleve = '$id_eleve'";
                //echo $query;
                $eleve = mysqli_fetch_array(mysqli_query($connect, $query));
                $query = "SELECT DateSeance FROM seances WHERE idSeance = '$id_seance'";
                //echo $query;
                $seance = mysqli_fetch_array(mysqli_query($connect, $query));

                if (!(is_numeric($id_eleve))||!(is_numeric($id_seance))){
                    echo "<div class = 'Error'>Les entrées reçues ne sont pas des entiers</div>";
                    die();
                }

                
                $query = "DELETE FROM inscriptions WHERE `ideleve` = '$id_eleve' AND `idseance` = '$id_seance'";
                //echo $query;//TODO:Test
		echo "L'élève a bien été désinscrit";
                mysqli_query($connect, $query);
                mysqli_close($connect);
		?>
		<br><a href = "desinscription_seance.php" target = "content">Désinscrire un autre élève</a>
		<br><a href = "accueil.html" target = "content" onclick = "changeColors('acc_div');">Retour à l'accueil</a>
        </div>
        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>
</html>
