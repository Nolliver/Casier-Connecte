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

	<link rel="stylesheet" type="text/css" href="recherche.css">

</head>
<body>

	<a role="button" href="index.php" class="d-none d-lg-block" id="bouton_acceuil"></a>

	<div class="container h-100 justify-content-center mb-5">
		<?php 
			include("connexion.php");

			$sql='SELECT distinct emplacement from produits order by emplacement;';
			$emp =array();
			foreach ($bdd -> query($sql) as $ligne) {
				array_push($emp, $ligne['emplacement']);
			}

			foreach ($emp as $key => $value) {
				$sql='SELECT * from (produits inner join categorie on produits.categorie = categorie.id) inner join sous_categorie on sous_categorie.id = produits.sous_categorie where emplacement = '.$value.' order by nom, type, taille, longueur;';

						echo "<div class='col-12'>";
							echo "<div class='row mb-5 col-12'>";
								echo "<h1>Emplacement n°".$value."</h1>";
								echo "<table class='table table-striped col-12'>";
									foreach ($bdd -> query($sql) as $ligne) {
										$texte = '<tr><td><img class="rounded border border-secondary" src="icone500px500px/'.$ligne['nom_icone'].'"></td><td class="align-middle"> '.$ligne['nom'].' '.$ligne['taille'].' '.$ligne['type'];
										if (!empty($ligne['longueur'])) {
											$texte = $texte.' lg '.$ligne['longueur'].'mm';
										}
										echo $texte." <td>".$ligne['emplacement']."</td></td><td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='http://192.168.1.39/".$ligne['emplacement']."'>Voir l'emplacement</a></td></tr>";
									}
								echo "</table>";
							echo "</div>";
						echo "</div>";
			}



		 ?>
	</div>
	
</body>
</html>