<?php

$login = $_POST['login'];
$mdp = $_POST['mdp'];

require_once("database.php");

$requete = "select utilisateur from compte where login='$login' AND mdp='$mdp'";
$resultat = mysqli_query($database, $requete)or die(mysql_error());
$ligne = mysqli_fetch_array($resultat, MYSQLI_ASSOC);


function rediriger($utilisateur){
    if($utilisateur == "admin"){
        header("Location: accueil_admin.php");
    }
    if($utilisateur == "parent"){
        header("Location: accueil_parent.php");
    }
    if($utilisateur == "nounou"){
        header("Location: reservation_nounou.php");
    }

    

}
if($resultat){
    $utilisateur = $ligne["utilisateur"];
    rediriger($utilisateur);
        }   
    else{
        echo("erreur connexion...");
    }

mysqli_close($database);





