<?php

function voir_dossier($tab) {
    echo("<form method='post' action='dossier_nounou.php'>");
    $id_nounou = $tab["id_nounou"];
    echo"<input type='hidden' name='id_nounou' value='$id_nounou' >";
    echo"<button class='btn waves-effect waves-light' type='submit' name='action'> Voir dossier complet ";
    echo"</form>";
    echo"<br>";
}

function modifier_candidature($tab) {
    echo"<div class='input-field s12' style='width: 50%'>";
    echo("<form method='post' action='modifier_candidature.php'>");
    $id_nounou = $tab["id_nounou"];
    $candidature = $tab['candidature'];
    echo"<input type='hidden' name='id_nounou' value='$id_nounou'>";
    echo"<input type='hidden' name='candidature' value='$candidature'>";
    if ($tab["candidature"] == 'En attente') {
        echo"Accepter candidature ? <br>";
        $modif = array('oui', 'non');
        select('modifier', $modif);
        echo"<button class='btn waves-effect waves-light' type='submit' name='action'> Modifier";
        echo"<br>";
    } else if ($tab["candidature"] == 'Acceptée') {
        echo"Mettre candidature en attente ? <br>";
        $modif = array('oui', 'non');
        select('modifier', $modif);
        echo"<button class='btn waves-effect waves-light' type='submit' name='action'> Modifier";
        echo"<br>";
    }

    echo"</form>";
    echo("</div>");
}

function select($name, $data) {
    echo ("<select name = '$name'><br/>");
    echo"<option value=' '></option>\n";
    foreach ($data as $elm) {
        echo ("<option value='$elm'>$elm</option>\n");
    }
    echo ("</select>");
}

function select_id($name, $data) {
    echo ("<select name = '$name'><br/>");
    echo"<option value=' '></option>\n";
    $i = 1;
    foreach ($data as $elm) {
        echo ("<option value=$i>$elm</option>\n");

        $i++;
    }
    echo ("</select>");
}

function select_multiple_id($name, $data) {
    echo"<div class='input-field col s12'>";
    echo ("<select multiple name = '$name'><br/>");
    $i = 1;
    foreach ($data as $elm) {
        echo ("<option value=$i>$elm</option>\n");

        $i++;
    }
    echo ("</select>");
}

function entrée($label, $nom) {
    echo("<div class='input-field col s6'>");
    echo("<i class='material-icons prefix'>textsms</i>");
    echo("<label for='$nom'> $label </label>");
    echo("<input type='text' name='$nom' id='$nom' class='autocomplete'/>");
    echo("</div>");
}
