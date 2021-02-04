<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Recherche</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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