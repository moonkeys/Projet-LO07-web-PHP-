<?php
require_once("database.php");
require 'functions.php';
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Voir toutes les nounous</title>

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
                    <h5 class="header col s12 light">
                        <?php
                        $requete2 = "select `id_nounou`, `nom`, `prenom`, `ville`, `age`,`candidature`,photo from nounou";
                        $resultat2 = mysqli_query($database, $requete2)or die(mysql_error());
                        if ($resultat2) {
                            $i = 1;
                            echo"<div class='section'><div class='row s12 m4'>";
                            while ($ligne2 = mysqli_fetch_array($resultat2, MYSQLI_ASSOC)) {
                                $photo = $ligne2['photo'];
                                echo"<div class='col s12 m4'>
                                    <h2 class='center light-blue-text'><img src='$photo'/></h2>
                                    <h5 class='center'>Nounou #$i</h5>";
                                foreach ($ligne2 as $cle => $val) {
                                    echo"<p class='light'>$cle : $val </p>";
                                    if ($cle == 'id_nounou') {
                                        $id_nounou = $val;
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
                                modifier_candidature($ligne2);
                                voir_dossier($ligne2);

                                echo"</div>";
                                $i++;
                            }
                            echo"</div></div>";
                        }
                        
                        ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">User Experience Focused</h5>

                            <p class="light"></p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">User Experience Focused</h5>

                            <p class="light"></p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Easy to work with</h5>

                            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                        </div>
                    </div>
                </div>

            </div>
            <br><br>
        </div>



        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript" src="js/biblio_js.js"></script>
    </body>
</html>












