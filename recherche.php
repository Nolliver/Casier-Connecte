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

	<div class="container h-100 justify-content-center d-flex mb-5">
			<?php 

			include("connexion.php");
			include("fonction.php");

				if (!isset($_GET['table'])){
					//Recherche des catégories

						$categ = array(
							array('nom_table' => "element_mecanique", 'Titre' => "Elements mecaniques" , 'nom_photo' => "elements_mecaniques.jpg"),
							array('nom_table' => "composants_electroniques", 'Titre' => "Composants electroniques" , 'nom_photo' => "composants_electroniques.jpg"),
							array('nom_table' => "outils", 'Titre' => "Outils" , 'nom_photo' => "outils.jpg"), 
							array('nom_table' => "quincaillerie", 'Titre' => 'Quincaillerie' , 'nom_photo' => 'quincaillerie.jpg')
						);

					// Affichage des catégories
						echo "<div class='my-auto col-12'>";
							echo "<div class='row my-5'>";
								foreach ($categ as $ligne) {
									echo "<figure class='col-sm-6 col-md-3'>";
										echo "<a class='text-center d-block' href='recherche.php?table=".$ligne['nom_table']."'>";
											echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_photo']."'>";
											echo "<figcaption class='mx-auto'>".$ligne['Titre']."</figcaption>";
										echo "</a>";
									echo "</figure>";
								}
				}


				if (isset($_GET['table']) and !isset($_GET['sous_categorie'])) {
					//Recherche des sous-catégories

						$sql = 'SELECT distinct sous_categorie.id_sous_categ, sous_categorie.lib_sous_categ, sous_categorie.nom_photo from ('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ order by sous_categorie.lib_sous_categ;';

					// Affichage des sous-catégories
						echo "<div class='my-auto col-12'>";
							echo "<div class='row align-items-center my-5'>";
								foreach ($bdd -> query($sql) as $ligne) {
									echo "<figure class='col-sm-6 col-md-3'>";
										echo "<a class='text-center d-block' href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['id_sous_categ']."'>";
											echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_photo']."'>";
											echo "<figcaption class='mx-auto'>".$ligne['lib_sous_categ']."</figcaption>";
										echo "</a>";
									echo "</figure>";
								}
				}



				if (isset($_GET['sous_categorie'])) {
					// Récupération des noms de colonnes de la catégorie choisie
						$sql = 'SELECT * from '.$_GET['table'].';';
						$result = $bdd -> query($sql);
						$var_categ = array_keys($result->fetch(PDO::FETCH_ASSOC));


					//Recherche des sous-catégories
						$sql = 'SELECT * from ((('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ) inner join emplacement on produits.id_produit = emplacement.id_produit) inner join casier on emplacement.id_casier = casier.id_casier where sous_categorie.id_sous_categ ='.$_GET['sous_categorie'].';';


					//Recherche des colonnes n'étant pas entièrement vide
						$result = $bdd -> query($sql);
						$result = $result->fetchAll(PDO::FETCH_ASSOC);
						$var_not_null = notemptycol($result);

					//On fait ne garde que l'intersection des variables se trouvant dans la liste des variables de la catégorie choisie, et dans la liste des variables non entièrement vide
						$var = array_intersect($var_categ, $var_not_null);


					// Affichage des sous-catégories
						echo "<div class='col-12'>";
							echo "<div class='row mb-5 col-12'>";
								echo "<table class='table table-striped col-12'>";
									echo "<tr>";
										echo "<th></th>";
										foreach ($var as $value) {
											echo '<th>'.$value.'</th>';
										}
										echo '<th>Quantité</th><th>Emplacement</th><th></th>';
									echo "</tr>";

									foreach ($result as $ligne) {
										echo '<tr>';
										echo'<td><img class="rounded border border-secondary" src="icone500px500px/'.$ligne['nom_photo'].'"></td>';
										foreach ($var as $value) {
											echo '<td>'.$ligne[$value].'</td>';
										}
										echo"<td>".$ligne['quantite']."</td><td>".$ligne['num']."</td></td><td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='https://".$ligne['adresse_ip'].'/'.$ligne['num']."'>Voir l'emplacement</a></td>";
										echo '</tr>';
									}
								echo "</table>";
					}
	 			
			 ?>
			</div>
				<a role="button" href="index.php" class="offset-md-3 col-md-6 btn btn-outline-info my-5 d-lg-none">Retour à l'acceuil</a>
			</div>
	</div>
	
</body>
</html>