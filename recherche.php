<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Recherche</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">

		<?php 

		include("connexion.php");

			if (!isset($_GET['categorie'])){
				//Recherche des catégories

					$sql='SELECT distinct categorie from produits order by categorie;';

				// Affichage des catégories

					foreach ($bdd -> query($sql) as $ligne) {
						echo "<a href='recherche.php?categorie=".$ligne['categorie']."'>".$ligne['categorie']."</a><br/>";
					}
			}


			if (isset($_GET['categorie']) and !isset($_GET['sous_categorie'])) {
				//Recherche des sous-catégories

					$sql = 'SELECT distinct sous_categorie from produits where categorie="'.$_GET['categorie'].'"order by sous_categorie;';

				// Affichage des sous-catégories
					
					foreach ($bdd -> query($sql) as $ligne) {
						echo "<a href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['sous_categorie']."'>".$ligne['sous_categorie']."</a><br/>";
					}
			}



			if (isset($_GET['sous_categorie'])) {
				//Recherche des sous-catégories

					$sql = 'SELECT * from produits where categorie="'.$_GET['categorie'].'" and sous_categorie = "'.$_GET['sous_categorie'].'" order by nom, type, taille, longueur;';

				// Affichage des sous-catégories
					echo "<table class='table table-striped'>";
						foreach ($bdd -> query($sql) as $ligne) {
							$texte = '<tr><td><img height=80px width=80px src="icone500px500px/'.$ligne['nom_icone'].'"></td><td class="align-middle"> '.$ligne['nom'].' '.$ligne['taille'].' '.$ligne['type'];
							if (!empty($ligne['longueur'])) {
								$texte = $texte.' lg '.$ligne['longueur'].'mm';
							}
							echo $texte." </td><td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='http://192.168.1.34/".$ligne['emplacement']."'>Voir l'emplacement</a></td></tr>";
						}
					echo "</table>";

			}
 
		 ?>

	</div>

</body>
</html>