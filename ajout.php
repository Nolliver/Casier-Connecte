<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="css/formajout.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery.chained.js"></script>
</head>
<body>
	<div class="container mb-5">
		<?php 
		include("connexion.php");
		include("fonction.php");

		$table = "";
		if (isset($_POST['Table']) and !empty($_POST['Table'])){
			$table = $_POST['Table'];
		}

		$sous_categ = "";
		if (isset($_POST['sous_categorie']) and !empty($_POST['sous_categorie'])){
			$sous_categ = $_POST['sous_categorie'];
		}

		$autre = "";
		if (isset($_POST['autre']) and !empty($_POST['autre'])){
			$autre = $_POST['autre'];
		}
		


		;?>

		<div class="row col-md-12 mb-5">
			<h1 class="text-center col-md-12 display-4">Ajout dans la base de données</h1>
		</div>
		
		<div class="row">
			<form method="POST" action="ajout.php" class="form offset-md-2 col-md-8" name="ajout">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Categorie:</label>
						<select id="Table" name="Table" class="form-control" onchange="submit()">
							<option value="">------- Choisissez une catégorie -------</option>
							<option value="quincaillerie" <?php if($table == "quincaillerie"){echo "selected";}  ?> >Quincaillerie</option>
							<option value="outils" <?php if($table == "outils" ){echo "selected";}  ?> >Outils</option>
							<option value="composants_electroniques" <?php if($table == "composants_electroniques" ){echo "selected";}  ?> >Composants éléctroniques</option>
							<option value="elements_mecaniques" <?php if($table == "elements_mecaniques"){echo "selected";}  ?> >Eléments mécaniques</option>
						</select>
					</div>
				</div>

				<?php 
					if ($table <> ""){
						$table = $_POST['Table'];
						echo "<div class='form-row'>\n";
							$taille = ($sous_categ == 'autre') ? 'col-md-6' : 'col-md-12'; 
							echo "<div class='form-group ".$taille."'>\n";
								echo "<label>Sous-categorie:</label>\n";
								echo "<select id='sous_categorie' name='sous_categorie' class='form-control' onchange='submit()'>\n";
									echo "<option value=''>------- Choisissez une catégorie -------</option>";

										$sql="SELECT distinct sous_categorie.id_sous_categ, lib_sous_categ FROM (sous_categorie INNER JOIN produits on produits.id_sous_categ = sous_categorie.id_sous_categ) INNER JOIN ".$table." on ".$table.".id_produit = produits.id_produit;";

										foreach ($bdd -> query($sql) as $ligne) {
											$selected = ($sous_categ == $ligne['id_sous_categ']) ? "selected" : "";
											echo "<option value='".$ligne['id_sous_categ']."' ".$selected." >".$ligne['lib_sous_categ']."</option>\n";
										}

										$selected = ($sous_categ == 'autre') ? "selected" : "";
										echo "<option value='autre' ".$selected.">Autre</option>\n";

								echo "</select>\n";
							echo "</div>\n";
							
							if ($sous_categ == 'autre') {
								echo "<div class='form-group col-md-6'>\n";
									echo "<label>Autre </label>\n";
									echo "<input type='text' id='autre' class='form-control' required>\n";
								echo "</div>\n";
							}
						echo "</div>\n";



						if ($sous_categ <> "") {
							// Récupération des noms de colonnes de la catégorie choisie
							$sql = 'SHOW COLUMNS FROM '.$table.';';
							$result = $bdd -> query($sql);
							$var_categ = array();
							foreach ($bdd -> query($sql) as $ligne) {
								array_push($var_categ, $ligne['Field']);
							}
							unset($var_categ[array_search('id_produit', $var_categ)]);

							if ($autre <> '') {
								//Recherche des sous-catégories
									$sql = 'SELECT * from ((('.$table.' inner join produits on '.$table.'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ) inner join emplacement on produits.id_produit = emplacement.id_produit) inner join casier on emplacement.id_casier = casier.id_casier where sous_categorie.id_sous_categ ='.$sous_categ.';';

								//Recherche des colonnes n'étant pas entièrement vide
									$result = $bdd -> query($sql);
									$result = $result->fetchAll(PDO::FETCH_ASSOC);
									$var_not_null = notemptycol($result);

								//On ne garde que l'intersection des variables se trouvant dans la liste des variables de la catégorie choisie, et dans la liste des variables non entièrement vide
									$var = array_intersect($var_categ, $var_not_null);
								} else {
									$var = $var_categ;
								}

								foreach ($var as $key => $value) {
									$sql = 'SELECT DISTINCT '.$table.'.'.$value.' from ('.$table.' inner join produits on '.$table.'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ where sous_categorie.id_sous_categ ='.$sous_categ.';';

									echo "<div class='form-row'>\n";
										echo "<div class='form-group col-md-12'>\n";
											echo "<label for='".$value."'>".$value.":</label>\n";
											echo "<input list='list_".$value."' type='text' id='".$value."' class='form-control'>\n";
											echo "<datalist id='list_".$value."'>\n";
												foreach ($bdd -> query($sql) as $ligne) {
													echo "<option value='".$ligne[$value]."'>\n";
												}	
											echo "</datalist>\n";
										echo "</div>\n";
									echo "</div>\n";
								}
							

							echo "<div class='form-row'>\n";
								echo "<div class='form-group col-md-6'>\n";
									echo "<label>Casier: </label>\n";
									echo "<select name='casier' id='casier' class='form-control'>\n";
											$sql='SELECT distinct id_casier FROM casier order by id_casier;';

											foreach ($bdd -> query($sql) as $ligne) {
												echo "<option value='".$ligne['id_casier']."'>".$ligne['id_casier']."</option>\n";
											}
									echo "</select>\n";
								echo "</div>\n";


								echo "<div class='form-group col-md-6'>\n";
									echo "<label for='tiroir'>Tiroir:</label>\n";
										echo "<input type='text' id='tiroir' class='form-control' required>\n";
								echo "</div>\n";
							echo "</div>\n";

							echo "<div class='form-row'>\n";
								echo "<div class='form-group col-md-12'>\n";
									echo "<label for='quantite'>Quantité:</label>\n";
									echo "<input type='text' id='quantite' class='form-control' required>\n";
								echo "</div>";
							echo "</div>\n";

							echo "<div class='form-row'>\n";
								echo "<a role='button' href='index.php' class='form-control col-md-5 btn btn-outline-danger'>Abandonner</a>\n";
								echo "<input type='submit' value='Ajouter' class='form-control btn btn-outline-success offset-md-2 col-md-5'>\n";
							echo "</div>\n";

						} 
					}

				 ?>

			</form>
		</div>
	</div>


</body>
</html>