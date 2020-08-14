<?php
// ATTENTION : vous n'avez pas besoin de toucher ce code
$hote="localhost";
$login= "root";
$pwd="";
$base= "InventaireAntoine";
//connexion au serveur
$connexion= mysqli_connect($hote,$login,$pwd,$base)
 or die ("Erreur connexion ! ".mysqli_connect_error());
?>
