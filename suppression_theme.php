
<html>
    <head>
        <title> Supprimer un thème </title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <meta charset = "utf-8">
    </head>
    <body>
        <div class = "page_header"> Supprimer un thème </div>
        <div class = "page_content"> 
	    Veuillez sélectionner le thème à supprimer : <br>
            <form method = "POST" action = "supprimer_theme.php">
                <table border = "0">
                    
                    <?php

                    $dbhost = "tuxa.sme.utc";
                    $dbuser = "nf92a065";
                    $dbpass = "ghdLQ90Fv3fr";
                    $dbname = "nf92a065"; 


                    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                    $query = "SELECT idTheme, Nom FROM themes WHERE supprime = '0'";

                    $result = mysqli_query($connect, $query);
                    echo "<select name = 'target' size = 10>";
                    while($row = mysqli_fetch_array($result)){
                        
                        printf("<option value = '%s'>%s</option>", $row[0], $row[1]);
                    }
                    echo "</select>"

                    
                ?>
                </table>
                <br>
                <input type = 'submit' value = 'Valider'>
            </form>
        </div>
        <div class = "page_footer">
            <?php
                date_default_timezone_set("europe/paris");
                printf("page générée le %s", date("y\-m\-d"));
            ?>
        </div>
    </body>
</html>
