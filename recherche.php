<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Recherche</title>
</head>
<body>


	<?php 

	include('connexion.php');

		if (!isset($_GET['categorie'])){
			//Recherche des catégories

				$query='SELECT distinct categorie from produits order by categorie;';

				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

			// Affichage des catégories

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<a href='recherche.php?categorie=".$ligne['categorie']."'>".$ligne['categorie']."</a><br/>";
				}
		}




		if (isset($_GET['categorie']) and !isset($_GET['sous_categorie'])) {
			//Recherche des sous-catégories

				$query = 'SELECT distinct sous_categorie from produits where categorie="'.$_GET['categorie'].'"order by sous_categorie;';

				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

			// Affichage des sous-catégories
				
				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<a href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['sous_categorie']."'>".$ligne['sous_categorie']."</a><br/>";
				}
		}



		if (isset($_GET['sous_categorie'])) {
			//Recherche des sous-catégories

				$query = 'SELECT * from produits where categorie="'.$_GET['categorie'].'" and sous_categorie = "'.$_GET['sous_categorie'].'" order by nom, type, taille, longueur;';

				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

			// Affichage des sous-catégories
				while ($ligne = mysqli_fetch_assoc($result)) {
					$texte = '<p><img height=80px width=80px src="icone500px500px/'.$ligne['nom_icone'].'"> '.$ligne['nom'].' '.$ligne['taille'].' '.$ligne['type'];
					if (!empty($ligne['longueur'])) {
						$texte = $texte.' lg '.$ligne['longueur'].'mm';
					}
					echo $texte." <a href='http://192.168.1.34/".$ligne['emplacement']."'>Voir l'emplacement</a></p>";
				}

		}


		mysqli_close($connexion); 
	 ?>

</body>
</html>