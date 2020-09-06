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

	<style type="text/css">
		html, body{
			height: 100%;
		}
	</style>

</head>
<body>
	<div class="container h-100 justify-content-center d-flex mb-5">
			<?php 

			include("connexion.php");

				if (!isset($_GET['categorie'])){
					//Recherche des catégories

						$sql='SELECT * from categorie order by libelle;';

					// Affichage des catégories
						echo "<div class='my-auto col-12'>";
							echo "<div class='row my-5'>";
								foreach ($bdd -> query($sql) as $ligne) {
									echo "<figure class='col-sm-6 col-md-3'>";
										echo "<a class='text-center d-block' href='recherche.php?categorie=".$ligne['id']."'>";
											echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_icone']."'>";
											echo "<figcaption class='mx-auto'>".$ligne['libelle']."</figcaption>";
										echo "</a>";
									echo "</figure>";
								}
							echo "</div>";
							echo '<a role="button" href="index.php" class="offset-md-3 col-md-6 btn btn-outline-info my-5 ">Retour à l\'acceuil</a>';
						echo "</div>";
				}


				if (isset($_GET['categorie']) and !isset($_GET['sous_categorie'])) {
					//Recherche des sous-catégories

						$sql = 'SELECT distinct sous_categorie.id, libelle, sous_categorie.nom_icone from sous_categorie inner join produits on sous_categorie.id = produits.sous_categorie where produits.categorie='.$_GET['categorie'].' order by libelle;';

					// Affichage des sous-catégories
						echo "<div class='my-auto col-12'>";
							echo "<div class='row align-items-center my-5'>";
								foreach ($bdd -> query($sql) as $ligne) {
									echo "<figure class='col-sm-6 col-md-3'>";
										echo "<a class='text-center d-block' href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['id']."'>";
											echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_icone']."'>";
											echo "<figcaption class='mx-auto'>".$ligne['libelle']."</figcaption>";
										echo "</a>";
									echo "</figure>";
								}
							echo "</div>";
							echo '<a role="button" href="index.php" class="offset-md-3 col-md-6 btn btn-outline-info my-5 ">Retour à l\'acceuil</a>';
						echo "</div>";
				}



				if (isset($_GET['sous_categorie'])) {
					//Recherche des sous-catégories

						$sql = 'SELECT * from produits where categorie="'.$_GET['categorie'].'" and sous_categorie = "'.$_GET['sous_categorie'].'" order by nom, type, taille, longueur;';

					// Affichage des sous-catégories
						echo "<div class='col-12'>";
							echo "<div class='row mb-5 col-12'>";
								echo "<table class='table table-striped col-12'>";
									foreach ($bdd -> query($sql) as $ligne) {
										$texte = '<tr><td><img class="rounded border border-secondary" height=80px width=80px src="icone500px500px/'.$ligne['nom_icone'].'"></td><td class="align-middle"> '.$ligne['nom'].' '.$ligne['taille'].' '.$ligne['type'];
										if (!empty($ligne['longueur'])) {
											$texte = $texte.' lg '.$ligne['longueur'].'mm';
										}
										echo $texte." </td><td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='http://192.168.1.39/".$ligne['emplacement']."'>Voir l'emplacement</a></td></tr>";
									}
								echo "</table>";
							echo "</div>";
							echo '<a role="button" href="index.php" class="offset-md-3 col-md-6 btn btn-outline-info my-5 ">Retour à l\'acceuil</a>';
						echo "</div>";

				}
	 			
			 ?>
	</div>
</body>
</html>