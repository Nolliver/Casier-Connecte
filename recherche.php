<!DOCTYPE html>
<?php	
	if (isset($_GET['table']) and isset($_GET['sous_categorie'])){
		echo "<html lang='fr'>\n";
	} else {
		echo "<html lang='fr' class='h-100'>\n";
	}
?>
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
<body class="h-100">

	<a role="button" href="index.php" class="d-none d-lg-block" id="bouton_acceuil"></a>
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
						echo "<div class='container h-100 justify-content-center d-flex mb-5'>\n";
							echo "<div class='my-auto col-12'>\n";
								echo "<div class='row my-5'>\n";
									foreach ($categ as $ligne) {
										echo "<figure class='col-sm-6 col-md-3'>\n";
											echo "<a class='text-center d-block' href='recherche.php?table=".$ligne['nom_table']."'>\n";
												echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_photo']."'>\n";
												echo "<figcaption class='mx-auto'>".$ligne['Titre']."</figcaption>\n";
											echo "</a>\n";
										echo "</figure>\n";
									}
								echo "</div>\n";
							echo "</div>\n";
						echo "</div>\n";
				}


				if (isset($_GET['table']) and !isset($_GET['sous_categorie'])) {
					//Recherche des sous-catégories

						$sql = 'SELECT distinct sous_categorie.id_sous_categ, sous_categorie.lib_sous_categ, sous_categorie.nom_photo from ('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ order by sous_categorie.lib_sous_categ;';

					// Affichage des sous-catégories
						echo "<div class='container h-100 justify-content-center d-flex mb-5'>\n";
							echo "<div class='my-auto col-12'>\n";
								echo "<div class='row align-items-center my-5'>\n";
									foreach ($bdd -> query($sql) as $ligne) {
										echo "<figure class='col-sm-6 col-md-3'>\n";
											echo "<a class='text-center d-block' href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['id_sous_categ']."'>\n";
												echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/".$ligne['nom_photo']."'>\n";
												echo "<figcaption class='mx-auto'>".$ligne['lib_sous_categ']."</figcaption>\n";
											echo "</a>\n";
										echo "</figure>\n";
									}
								echo "</div>\n";
							echo "</div>\n";
						echo "</div>\n";
				}



				if (isset($_GET['table']) and isset($_GET['sous_categorie'])) {
					// Récupération des noms de colonnes de la catégorie choisie
						$sql = 'SELECT * from '.$_GET['table'].';';
						$result = $bdd -> query($sql);
						$var_categ = array_keys($result->fetch(PDO::FETCH_ASSOC));
						unset($var_categ[array_search('id_produit', $var_categ)]);


					//Recherche des sous-catégories
						$sql = 'SELECT * from ((('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ) inner join emplacement on produits.id_produit = emplacement.id_produit) inner join casier on emplacement.id_casier = casier.id_casier where sous_categorie.id_sous_categ ='.$_GET['sous_categorie'];

					//Recherche des colonnes n'étant pas entièrement vide
						$result = $bdd -> query($sql.';');
						$result = $result->fetchAll(PDO::FETCH_ASSOC);
						$var_not_null = notemptycol($result);

					//On ne garde que l'intersection des variables se trouvant dans la liste des variables de la catégorie choisie, et dans la liste des variables non entièrement vide
						$var = array_intersect($var_categ, $var_not_null);


					//Recherche de filtre à appliquer
						if (!isset($_POST['reset'])) {
							$filtre = '';
							$array_filtre =  array();
							foreach ($var as $varindex => $varname) {
								if (isset($_POST[$varname])){
									$array_filtre[$varname] = array();
									$val_filtre = '(';
									foreach ($_POST[$varname] as $key => $value) {
										$val_filtre = $val_filtre.'"'.$value.'",';
										array_push($array_filtre[$varname], $value);
									}
									$val_filtre = substr($val_filtre,0,-1).')';
									$filtre = $filtre.' AND '.$_GET['table'].'.'.$varname.' in '.$val_filtre;
								}
							}
							$result = $bdd -> query($sql.$filtre.';');
							$result = $result->fetchAll(PDO::FETCH_ASSOC);
						}
							
					// Affichage des sous-catégories
						echo "<div class = container-fluid>\n";
							echo "<div class='col-12'>\n";
								echo "<div class='row mb-5 col-12 position-sticky'>\n";


								//Mis en place des filtres
									echo "<form class='form col-2 mt-5' method='POST' action='".$_SERVER['REQUEST_URI']."'>\n";
										echo "<nav class='nav flex-column justify-content-center col-1'>\n";
										$text_filtres = "";
									  		foreach ($var as $key => $value) {
									  			$sql = 'SELECT DISTINCT '.$_GET['table'].'.'.$value.' from ('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ where sous_categorie.id_sous_categ ='.$_GET['sous_categorie'].';';

									  			//Création des boutons dropright
									  			echo "<div class='m-2 btn-group dropright'>\n";
										  			echo "<button type='button' class='mx-auto btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\n";
												    	echo $value;
												  	echo "</button>\n";
												  	echo "<div class='dropdown-menu'>\n";
												  		$text_filtres = $text_filtres."<li>".$value."</li>\n<ul>\n";

												  		//vérification des filtres selectionnés à cocher
													  	foreach ($bdd -> query($sql) as $ligne) {
													  		if (isset($array_filtre[$value]) and !isset($_POST['reset'])){
													  			if (in_array($ligne[$value], $array_filtre[$value])) {
														  			$checked = "checked";
														  		} else {
														  			$checked ="";
													  			}
													  		} else {
													  			$checked ="";
													  		}

													  		//Mise en place des checkbox pour les filtres
													  		echo "<div class='ml-2 form-check'>\n";
													   			echo "<input type='checkbox' name='".$value."[]' id='".$value."-".$ligne[$value]."' value='".$ligne[$value]."' class='form-check-input' ".$checked." onclick='check_filtre(this,\"text_".$ligne[$value]."\")'>\n<label for='".$value."-".$ligne[$value]."' class='form-check-label'>".$ligne[$value]."</label><br>\n";
													   		echo "</div>\n";

													   		//Liste des filtres à afficher si coché
													   		$text_filtres = $text_filtres."<li id='text_".$ligne[$value]."' style='display:none'>".$ligne[$value]."</li>\n";
													   	}
													 	$text_filtres = $text_filtres."</ul>\n";
													 echo "</div>\n";
												echo "</div>\n";
									  		}
										echo "</nav>\n";
										echo "<input type='submit' value='Mettre a jour les filtres' class='m-2 text-center'>\n";
										echo "<input type='submit' name='reset' value='Réinitialiser les filtres' class='m-2 text-center'>\n";
									echo "</form>\n";
									echo "<ul>\n";
										echo $text_filtres;
									echo "</ul>\n";
									

								//Remplissage du tableau
									echo "<table class='table table-striped col-8'>\n";
										echo "<tr>\n";
											echo "<th></th>\n";
											foreach ($var as $value) {
												echo "<th>".$value."</th>\n";
											}
											echo "<th>Quantité</th><th>Emplacement</th><th></th>\n";
										echo "</tr>\n";

										foreach ($result as $ligne) {
											echo "<tr>\n";
											echo"<td><img class='rounded border border-secondary' src='icone500px500px/".$ligne['nom_photo']."'></td>\n";
											foreach ($var as $value) {
												echo "<td>".$ligne[$value]."</td>\n";
											}
											echo"<td>".$ligne['quantite']."</td><td>".$ligne['num']."</td></td><td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='https://".$ligne['adresse_ip'].'/'.$ligne['num']."'>Voir l'emplacement</a></td>\n";
											echo "</tr>\n";
										}
									echo "</table>\n";
								echo "</div>\n";
							echo "</div>\n";
						echo "</div>\n";
					}
	 			
			 ?>
			</div>
				<a role="button" href="index.php" class="offset-md-3 col-md-6 btn btn-outline-info my-5 d-lg-none">Retour à l'acceuil</a>
			</div>
	</div>
	
</body>

<script type="text/javascript">
	function check_filtre(checkBox, id_text) {
		var text = document.getElementById(id_text);
	  // If the checkbox is checked, display the output text
	  if (checkBox.checked == true){
	     text.style.display = "block";
	  } else {
	     text.style.display = "none";
	  }
	}



</script>


</html>