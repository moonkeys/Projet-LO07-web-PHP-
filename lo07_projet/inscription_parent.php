<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Inscription parents</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="login.html">Accueil</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Page d'inscription</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Veuillez remplir tous les champs</h5>
                </div>
                <div class="row center">
                    <form method='post' action='inscription_enfants.php'>
                        <div class="row" style="width:40%">
                            <div class="col s12">
                                <div class="row">
                                    <?php
                                    require_once 'database.php';
                                    entrée("Nom", "nom");
                                    ligne();
                                    entrée("Adresse mail", "mail");
                                    ligne();
                                    echo("<div class='input-field col s12'>");
                                    echo("<i class='material-icons prefix'>textsms</i>");
                                    echo("<label for='mdp'> mot de passe </label>");
                                    echo("<input type='password' name='mdp' id='mdp' class='autocomplete'/>");
                                    echo("</div>");
                                    ligne();
                                    entrée("Numéro de téléphone", "tel");
                                    ligne();
                                    entrée("Ville", "ville");
                                    ligne();
                                    
                                    echo("<div class='input-field col s12'>");
                                    enfants();
                                    echo("</div>");

                                    //echo("<input type='submit' name='Valider'/>");
                                    //echo("<input type='reset' name='Reset'/>");
                                    ?>
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Suivant
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>        
                    </form>
                </div>
                <br><br>

            </div>
        </div>




        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script type='text/javascript' src='js/bibliotheque.js'></script>

    </body>
</html>




<?php
require_once 'database.php';

function enfants() {
    echo("<p>");
    echo("Nombre d'enfants que vous avez :");
    for ($i = 1; $i <= 6; $i++) {
        echo("<label>");
        echo("<input name = 'enfants' type = 'radio' value='$i'/>");
        echo("<span>$i</span>");
        echo("</label>");
    }
    echo("</p>");
}

function entrée($label, $nom) {
    echo("<div class='input-field col s6'>");
    echo("<i class='material-icons prefix'>textsms</i>");
    echo("<label for='$nom'> $label </label>");
    echo("<input type='text' name='$nom' id='$nom' class='autocomplete'/>");
    echo("</div>");
}

function ligne() {
    echo("</p>");
}

function checkbox($nom) {
    echo("<input id=$nom type='checkbox' name=$nom value=$nom>");
    echo("<label for='$nom'>$nom</label>");
}

$options = array(
    'mdp' => FILTER_SANITIZE_STRING,
    'prenom' => FILTER_SANITIZE_STRING, //Enlever les balises.
    'mail' => FILTER_VALIDATE_EMAIL, //Valider l'adresse de messagerie.
    'tel' => array(
        'filter' => FILTER_CALLBACK,
        'options' => 'validerNumero'
    )
);

function validerNumero($telATester) {
    //Retourne le numéro s'il est valide, sinon false.
    return preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $telATester) ? $telATester : false;
}

$resultat = filter_input_array(INPUT_POST, $options);


if ($resultat != null) { //Si le formulaire a bien été posté.
    //Enregistrer des messages d'erreur perso.
    $messageErreur = array(
        'mail' => 'L\'adresse de messagerie n\'est pas valide.',
    );

    $nbrErreurs = 0;

    foreach ($options as $cle => $valeur) { //Parcourir tous les champs voulus.
        if (empty($_POST[$cle])) { //Si le champ est vide.
            echo 'Veuillez remplir le champ ' . $cle . '.<br/>';
            $nbrErreurs++;
        } elseif ($resultat[$cle] === false) { //S'il n'est pas valide.
            echo $messageErreur[$cle] . '<br/>';
            $nbrErreurs++;
        }
    }
    $nom = $_POST['nom'];
//$requete = "insert into nounou values ('Lallement', 'Théo', 'Vertus', 'lallement.theo@gmail.com', 0787006516, 'Anglais', 21, 'dlfv')";
    if ($nbrErreurs == 0) {
        //$requete = "insert into nounou(nom, prenom, ville, email, portable, age) values ('$_POST[nom]', '$_POST[prenom]', '$_POST[ville]', '$_POST[mail]', $_POST[tel], $_POST[age])";
        //requete($database, $requete);
    }
} else {
    echo 'Vous n\'avez rien posté.';
}
