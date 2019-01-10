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
                    <h5 class="header col s10 m4 ">
                        <?php
                        echo"<div class='section'><div class='row'>";
                        require_once("database.php");
                        require"functions.php";

                        $id_nounou = $_POST['id_nounou'];
                        $requete = "select `id_nounou`, `nom`, `prenom`, `ville`, `age`,`candidature`,photo from nounou where id_nounou='$id_nounou'";
                        $resultat = mysqli_query($database, $requete)or die(mysql_error());
                        if ($resultat) {
                            while ($ligne = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
                                $photo = $ligne['photo'];
                                echo"<div class='row s12 m4'>
                                    <h2 class='center light-blue-text'><img src='$photo'/></h2>
                                    <h5 class='center'>Nounou #$id_nounou</h5>";
                                foreach ($ligne as $cle => $val) {
                                    if ($cle != 'photo') {
                                        echo"<p class='light'>$cle : $val </p>";
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
                                echo"<div style='width:25%'>";
                                modifier_candidature($ligne);
                                echo"</div></div>";
                            }
                        }

                        echo"</div>";
                        
                        echo"<div class='row s12 m4'>";
                        $requete2 = "select presentation from nounou where id_nounou=$id_nounou";
                        $resultat2 = mysqli_query($database, $requete2)or die(mysql_error());
                        if ($resultat2) {
                            while ($ligne2 = mysqli_fetch_array($resultat2, MYSQLI_ASSOC)) {
                                echo "Présentation : ";
                                $presentation = $ligne2['presentation'];
                                echo"$presentation <br>";
                            }
                        }
                        
                        $requete_eval = "SELECT note,avis FROM `evaluation` as E, nounou as N WHERE id_utilisateur=$id_nounou ";
                        $resultat_eval = mysqli_query($database, $requete_eval)or die(mysql_error());
                        if ($resultat_eval) {
                            $ligne_eval ;
                            foreach ($ligne_eval = mysqli_fetch_array($resultat_eval, MYSQLI_ASSOC) as $cle => $val) {
                                echo"$cle : $val  <br>";
                            }
                        }

                        echo"</div></div>";
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
