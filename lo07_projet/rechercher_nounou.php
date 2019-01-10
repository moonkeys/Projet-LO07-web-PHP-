<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Page d'accueil</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="accueil_admin.php">Accueil</a></li>
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
                    <h5 class="header col s6 m4 ">
                        <?php
                        require_once("database.php");
                        require"functions.php";

                        $requete = "SELECT `id_nounou`, `nom`, `prenom`, `ville`, `age`, `id_evaluation`,`candidature` FROM `nounou` as N, langues_nounou as LN WHERE N.id_nounou and LN.ref_nounou=id_nounou";
                        $resultat = mysqli_query($database, $requete)or die(mysql_error());
                        $ligne = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

                        $donnees_recherchees = array();
                        foreach ($ligne as $cle => $val) {
                            if ($_POST[$cle] == "" or $_POST[$cle] == " ") {
                                $_POST[$cle] = NULL;
                            }

                            if ($ligne == 'id_langues') {
                                $i = 1;
                                foreach ($_POST[$ligne] as $cle) {
                                    $donnees_recherchees["$cle $i"] = $_POST[$cle];
                                    $i++;
                                }
                            }

                            if (is_null($_POST[$cle]) == FALSE) {
                                $donnees_recherchees [$cle] = $_POST[$cle];
                            }
                        }

                        $requete3 = "select `id_nounou`, `nom`, `prenom`, `ville`, `age`,`candidature` from nounou where ";
                        foreach ($donnees_recherchees as $cle => $val) {
                            if ($cle != 'id_langues') {
                                $requete3 .= "$cle='$val' AND ";
                            }
                        }
                        $clean = rtrim($requete3, " AND ");
                        $resultat3 = mysqli_query($database, $clean)or die(mysql_error());
                        echo"<div class='section'><div class='row' >";
                        if ($resultat3) {
                            $i = 1;
                            while ($ligne3 = mysqli_fetch_array($resultat3, MYSQLI_ASSOC)) {
                                echo"<div class='col s6 m4'>";

                                foreach ($ligne3 as $cle => $val) {

                                    if ($cle == 'id_evaluation') {
                                        echo"Notes : $val <br>";
                                    } else if ($cle == 'presentation' or $cle == 'photo') {
                                        
                                    } else {
                                        echo"<p class='light'>$cle : $val </p>";
                                        if ($cle == 'id_nounou') {
                                            $id_nounou = $val;
                                        }
                                    }
                                }
                                echo"Langues parlées : <br>";
                                $requete_langue = "SELECT langue FROM langues as L, langues_nounou as LN WHERE LN.ref_langues=id_langue AND LN.ref_nounou=$id_nounou";
                                $resultat_langue = mysqli_query($database, $requete_langue)or die(mysql_error());
                                if ($resultat_langue) {
                                    while ($ligne_langue = mysqli_fetch_array($resultat_langue, MYSQLI_ASSOC)) {
                                        foreach ($ligne_langue as $elm) {
                                            echo"$elm ";
                                        }
                                    }
                                }
                                modifier_candidature($ligne3);
                                echo"<br>";
                                voir_dossier($ligne3);
                                echo"</div>";
                                $i++;
                                echo"<br>";
                            }
                        } else {
                            echo"pas de résultats";
                        }
                        ?>
                    </h5>
                    <a class='waves-effect waves-light btn' href=accueil_admin.php>Retour</a>
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
