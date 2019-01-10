<?php
require_once("database.php");
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Accueil Admin</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper blue-grey">
                <a href="photos/logo_street_nounou.png" class="brand-logo"></a>
                <ul id="nav-mobile" class="right">
                    <li><a href="login.html">Déconnexion</a></li>
                    <li>Admin</li>
                </ul>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Admin</h1>
                <div>
                    <h5 class="header col s12 light">
                        <?php
                        $acceptee = 0;
                        $requete1 = "select * from nounou";
                        echo"<div class='row m2'>";
                        $resultat1 = mysqli_query($database, $requete1)or die(mysql_error());
                        if ($resultat1) {
                            $total = mysqli_num_rows($resultat1);
                            echo"Nombre total de nounous inscrites : $total <br>";
                        }
                        $requete2 = "select candidature from nounou";
                        $resultat2 = mysqli_query($database, $requete2)or die(mysql_error());
                        while ($ligne2 = mysqli_fetch_array($resultat2, MYSQLI_ASSOC)) {
                            foreach ($ligne2 as $elm) {
                                if ($elm == "Acceptée") {
                                    $acceptee++;
                                }
                            }
                        }
                        $en_attente = $total - $acceptee;

                        echo"Nombre de candidatures en attente : $en_attente <br>";
                        echo"Nombre de candidatures acceptées : $acceptee <br>";
                        echo'</div>';

                        echo"<div class='row s12 m3'>";
                        $chiffre_affaire = array(0, 0, 0);
                        $requete_affaire = "SELECT * FROM `revenu` as R, nounou as N WHERE N.id_nounou=ref_revenu";
                        $resultat_affaire = mysqli_query($database, $requete_affaire)or die(mysql_error());
                        while ($ligne_affaire = mysqli_fetch_array($resultat_affaire, MYSQLI_ASSOC)) {
                            foreach ($ligne_affaire as $cle => $val) {
                                if ($cle == 'mois') {
                                    $chiffre_affaire[0] = $chiffre_affaire[0] + $val;
                                } else if ($cle == 'trimestre') {
                                    $chiffre_affaire[1] = $chiffre_affaire[1] + $val;
                                } else if ($cle == 'annee') {
                                    $chiffre_affaire[2] = $chiffre_affaire[2] + $val;
                                }
                            }
                        }
                        echo"Chiffre d'affaire du mois : $chiffre_affaire[0] <br>";
                        echo"Chiffre d'affaire du trimestre : $chiffre_affaire[1] <br>";
                        echo"Chiffre d'affaire de l'année : $chiffre_affaire[2] <br>";
                        echo"</div>";
                        ?>
                    </h5>
                    <br>
                    <a class="waves-effect waves-light btn-large" href='voir_nounou.php'>Voir toutes les nounous</a>
                </div>
                <div style='width: 42%'>
                    <h5 class="header col s4 m3">
                        <?php
                        echo"<div class='section'>";
                        echo"<br>Rechercher une nounou : <br>";
                        echo"<form method='post' action='rechercher_nounou.php'>";
                        entrée('ID :', 'id_nounou');
                        echo"</p>";
                        entrée('Nom :', 'nom');
                        echo"</p>";
                        entrée('Prénom :', 'prenom');
                        echo"</p>";
                        entrée('Ville :', 'ville');
                        echo"</p>";
                        entrée('Age :', 'age');
                        echo"</p>";

                        echo"<div class='col s6 m6' style='width:55%'>";
                        $requete3 = "select langue from langues";
                        $resultat3 = mysqli_query($database, $requete3)or die(mysql_error());
                        $langue = array();
                        $i = 0;
                        while ($ligne3 = mysqli_fetch_array($resultat3, MYSQLI_NUM)) {
                            foreach ($ligne3 as $elm) {
                                $langue[$i] = $elm;
                            }
                            $i++;
                        }
                        echo"Langues parlées : <br>";
                        echo"<div class='input-field col s12'>";
                        echo ("<select multiple name ='id_langues[]'><br/>");
                        $j = 1;
                        foreach ($langue as $elm) {
                            echo ("<option value=$j>$elm</option>\n");

                            $j++;
                        }
                        echo ("</select>");
                        $note = array('pas de notes', 1, 2, 3, 4, 5);
                        echo"Evaluation :";
                        echo ("<select name = 'id_evaluation'><br/>");
                        echo"<option value=' '></option>\n";
                        $a = -1;
                        foreach ($note as $elm) {
                            echo ("<option value=$a>$elm</option>\n");
                            $a++;
                        }
                        echo ("</select>");

                        echo"<br>";
                        echo"Candidature :";
                        $etat = array('Acceptée', 'En attente');
                        select('candidature', $etat);

                        echo"</div></div>";
                        echo"<button class='btn waves-effect waves-light' type='submit' name='action'>Rechercher";
                        echo"</form>";
                        ?>
                    </h5>
                </div>

            </div>
        </div>




        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript" src="js/biblio_js.js"></script>
    </body>
</html>




