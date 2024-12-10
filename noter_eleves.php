<html>
    <head>
        <title>Valider séance</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
    </head>
    <body>
        
        <script src = "script.js" defer></script>
        <div class = "page_header">Valider séance</div>
        <div class = "page_content">
            <?php
                
            $dbhost = "tuxa.sme.utc";
            $dbuser = "nf92a065";
            $dbpass = "ghdLQ90Fv3fr";
            $dbname = "nf92a065";

            $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $seance = $_POST["idseance"];
            //TODO: Repasser par l'id des élèves. Pas de compteur.
            $query = "SELECT el.idEleve FROM eleves AS el JOIN inscription AS ins ON el.ideleve = ins.idEleve WHERE ins.idSeance = $seance";
            //echo $query;
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_array($result)){
                $current_el_nbfautes = $_POST["el".$row[0]."note"];
                if ($current_el_nbfautes != -1 ){ //empty($current_el_nbfautes)
                    $note = (40 - $current_el_nbfautes)/2;
                    $query = "UPDATE inscription SET note = ".$note." WHERE `idSeance` = '".$seance."' AND `idEleve` = '".$row[0]."'";
                    //echo $query; 
                    mysqli_query($connect, $query);
                }

                
            }
        printf("Les notes ont été entrées avec succès !");
    ?>
        <br><a href = "validation_seance.php" target = "content">Valider une nouvelle séance </a><br>
        <a href = "accueil.html" target = "content" onclick = "changeColors('acc_div')">Retour vers l'accueil</a>
        </div>

        <div class = "page_footer">
            <?php
                date_default_timezone_set("Europe/Paris");
                printf("Page générée le %s", date("Y\-m\-d"));
            ?>
        </div>
    </body>

</html>
