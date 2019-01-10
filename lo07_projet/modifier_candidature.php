<?php

require_once 'database.php';

$id_nounou = $_POST["id_nounou"];
echo"$id_nounou";
$etat = $_POST['candidature'];

if ($_POST['modifier'] == ' ') {
    header("Location: accueil_admin.php");
}

if ($etat == 'En attente') {
    if ($_POST['modifier'] == 'oui') {
        $requete = "update nounou set candidature='Acceptée' where id_nounou='$id_nounou'";
        $resultat = mysqli_query($database, $requete)or die(mysql_error());
        header("Location: accueil_admin.php");
    }

    if ($_POST['modifier'] == 'non') {
        $requete = "delete from nounou where id_nounou='$id_nounou'";
        $resultat = mysqli_query($database, $requete)or die(mysql_error());
        header("Location: accueil_admin.php");
    }
} else if ($etat == 'Acceptée') {
    if ($_POST['modifier'] == 'oui') {
        $requete = "update nounou set candidature='En attente' where id_nounou='$id_nounou'";
        $resultat = mysqli_query($database, $requete)or die(mysql_error());
        header("Location: accueil_admin.php");
    }

    if ($_POST['modifier'] == 'non') {
        header("Location: accueil_admin.php");
    }
}


