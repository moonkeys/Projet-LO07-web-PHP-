<?php

define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('BASE_NAME', 'test');

$database = mysqli_connect(HOST,USER,PASSWORD,BASE_NAME)
    or die('Impossible de se connecter a MySQL :' + mysqli_connect_error());


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    
echo"<link rel='stylesheet' type='text/css'href='style.css'/>";
if ($database == TRUE) {
} else {
    echo'Echec<br/>';
}

function requete($database,$requete) {
	$resultat = mysqli_query($database, $requete);
	if($resultat){
		$requete;
	}
	else{
		if (mysqli_errno($database)==1062){
			echo "Il y a un doublon ! </br>";
			return 1062;
		}
		else{
			echo $requete;
		}
	}
	return $resultat;
}
function debug($array){
	echo '<pre>';
	var_dump($array);
	echo '</pre>';
}
