<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery.chained.js"></script>
	<style type="text/css">
		/* ============ desktop view ============ */
		@media all and (min-width: 992px) {
			.navbar .nav-item .dropdown-menu{ display: none; }
			.navbar .nav-item:hover .nav-link{ color: #fff;  }
			.navbar .nav-item:hover .dropdown-menu{ display: block; }
			.navbar .nav-item .dropdown-menu{ margin-top:0; }
		}
		/* ============ desktop view .end// ============ */
	</style>
</head>
<body>
	<nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid justify-content-end">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	    <div class="collapse navbar-collapse" id="navbarScroll">
	      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
					</li>
	        <li class="nav-item">
	          <a class="nav-link" href="ajout.php">Ajouter</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="recherche.php" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Rechercher
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
							<li><a class="dropdown-item" href="recherche.php">Rechercher</a></li>
							<li><hr class="dropdown-divider"></li>
	            <li><a class="dropdown-item" href="recherche.php?table=quincaillerie">Quincaillerie</a></li>
	            <li><a class="dropdown-item" href="recherche.php?table=outils">Outils</a></li>
							<li><a class="dropdown-item" href="recherche.php?table=composants_electroniques">Composants éléctroniques</a></li>
							<li><a class="dropdown-item" href="recherche.php?table=elements_mecaniques">Elements mécaniques</a></li>
	          </ul>
	        </li>
					<li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="edit_del.php" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Modifier/Supprimer
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
							<li><a class="dropdown-item" href='edit_del.php'>Modifier/Supprimer</a></li>
							<li><hr class="dropdown-divider"></li>
	            <li><a class="dropdown-item" href='edit_del.php?table=quincaillerie'>Quincaillerie</a></li>
	            <li><a class="dropdown-item" href="edit_del.php?table=outils">Outils</a></li>
							<li><a class="dropdown-item" href="edit_del.php?table=composants_electroniques">Composants éléctroniques</a></li>
							<li><a class="dropdown-item" href="edit_del.php?table=elements_mecaniques">Elements mécaniques</a></li>
	          </ul>
	        </li>
					<li class="nav-item">
						<a class="nav-link" href=verif.php>Vérification</a>
					</li>
	      </ul>
	    </div>
			<div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Casier connecté</a>
	    </div>
			<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
	    </div>
	  </div>
	</nav>

	<div class="container mb-5">
		<?php
			include("connexion.php");
			include("fonction.php");

			if (!isset($_POST['btn_ajout'])) {
				$table = "";
				$sous_categ = "";

				if (isset($_POST['Table']) and !empty($_POST['Table'])){
					$table = $_POST['Table'];
				}

				$sous_categ = "";
				if (isset($_POST['sous_categorie']) and !empty($_POST['sous_categorie'])){
					$sous_categ = $_POST['sous_categorie'];
				}

				echo "<div class='row col-12 mb-5'>\n";
					echo "<h1 class='text-center col-12 display-4'>Ajout dans la base de données</h1>\n";
				echo "</div>\n";

				echo "<div class='row'>\n";
					echo "<form method='POST' action='ajout.php' class='offset-2 col-8' name='ajout'>\n";

						echo "<div class='row'>\n";
							echo "<div class='form-group col-md-12'>\n";
								echo "<label class='mt- form-label'>Categorie:</label>\n";
								echo "<select name='Table' name='Table' class='form-control' onchange='submit()'>\n";
									echo "<option value=''>------- Choisissez une catégorie -------</option>\n";
									echo "<option value='quincaillerie' ".($table == 'quincaillerie' ? 'selected' : '').">Quincaillerie</option>\n";
									echo "<option value='outils' ".($table == 'outils' ? 'selected': '').">Outils</option>\n";
									echo "<option value='composants_electroniques' ".($table == 'composants_electroniques' ? 'selected': '').">Composants éléctroniques</option>\n";
									echo "<option value='elements_mecaniques' ".($table == 'elements_mecaniques' ? 'selected': '').">Eléments mécaniques</option>\n";
								echo "</select>\n";
							echo "</div>\n";
						echo "</div>\n";

						if ($table <> ""){
							$table = $_POST['Table'];
							echo "<div class='row'>\n";
								echo "<div class='form-group ".($sous_categ == 'autre' ? 'col-md-6' : 'col-md-12')."'>\n";
									echo "<label class='mt- form-label'>Sous-categorie:</label>\n";
									echo "<select name='sous_categorie' name='sous_categorie' class='form-control' onchange='submit()'>\n";
										echo "<option value=''>------- Choisissez une catégorie -------</option>";

											$sql="SELECT distinct sous_categorie.id_sous_categ, lib_sous_categ FROM (sous_categorie INNER JOIN produits on produits.id_sous_categ = sous_categorie.id_sous_categ) INNER JOIN ".$table." on ".$table.".id_produit = produits.id_produit;";

											$array_sous_categ = array();
											foreach ($bdd -> query($sql) as $ligne) {
												$selected = ($sous_categ == $ligne['id_sous_categ']) ? "selected" : "";
												echo "<option value='".$ligne['id_sous_categ']."' ".$selected." >".$ligne['lib_sous_categ']."</option>\n";
												array_push($array_sous_categ, $ligne['id_sous_categ']);
											}
											$selected = ($sous_categ == 'autre') ? "selected" : "";
											echo "<option value='autre' ".$selected.">Autre</option>\n";
											array_push($array_sous_categ, 'autre');
											if (!in_array($sous_categ, $array_sous_categ)){ $sous_categ = '';}


									echo "</select>\n";
								echo "</div>\n";

								if ($sous_categ == 'autre') {
									echo "<div class='form-group col-md-6'>\n";
										echo "<label class='mt- form-label'>Autre </label>\n";
										echo "<input type='text' name='autre' class='form-control' required>\n";
									echo "</div>\n";
								}
							echo "</div>\n";



							if ($sous_categ <> "") {
								// Récupération des noms de colonnes de la catégorie choisie
								$sql = 'SHOW COLUMNS FROM '.$table.';';

								$var_categ = array();
								foreach ($bdd -> query($sql) as $ligne) {
									array_push($var_categ, $ligne['Field']);
								}
								unset($var_categ[array_search('id_produit', $var_categ)]);

								if ($sous_categ <> 'autre') {
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

										echo "<div class='row'>\n";
											echo "<div class='form-group col-md-12'>\n";
												echo "<label class='mt- form-label' for='".$value."'>".$nom_col[$value].":</label>\n";
												echo "<input list='list_".$value."' type='text' name='".$value."' class='form-control'>\n";
												echo "<datalist id='list_".$value."'>\n";
													foreach ($bdd -> query($sql) as $ligne) {
														echo "<option value='".$ligne[$value]."'>\n";
													}
												echo "</datalist>\n";
											echo "</div>\n";
										echo "</div>\n";
									}


								echo "<div class='row'>\n";
									echo "<div class='form-group col-md-6'>\n";
										echo "<label class='mt- form-label'>Casier: </label>\n";
										echo "<select name='casier' name='casier' class='form-control'>\n";
												$sql='SELECT distinct id_casier FROM casier order by id_casier;';

												foreach ($bdd -> query($sql) as $ligne) {
													echo "<option value='".$ligne['id_casier']."'>".$ligne['id_casier']."</option>\n";
												}
										echo "</select>\n";
									echo "</div>\n";


									echo "<div class='form-group col-md-6'>\n";
										echo "<label class='mt- form-label' for='tiroir'>Tiroir:</label>\n";
											echo "<input type='text' name='tiroir' class='form-control' required>\n";
									echo "</div>\n";
								echo "</div>\n";

								echo "<div class='row'>\n";
									echo "<div class='form-group col-md-12'>\n";
										echo "<label class='mt- form-label' for='quantite'>Quantité:</label>\n";
										echo "<input type='text' name='quantite' class='form-control' required>\n";
									echo "</div>";
								echo "</div>\n";
							}
						}

						echo "<div class='row mt-3'>\n";
							echo "<div class='col'>\n";
								echo "<a role='button' href='index.php' class='form-control btn btn-outline-danger'>Abandonner</a>\n";
							echo "</div>";
							echo "<div class='col'>\n";
									echo "<input type='submit' value='Ajouter' name='btn_ajout' class='form-control btn btn-outline-success ".($sous_categ <> ''?"" :"disabled")."'>\n";
							echo "</div>";
						echo "</div>\n";
					echo "</form>\n";
				echo "</div>\n";
			} else {
				//Récupération de la table et sous categorie
					$table = $_POST['Table'];
					$id_sous_categ = $_POST['sous_categorie'];

				//Ajout de la nouvelle sous_categorie si autre
					if ($id_sous_categ == 'autre'){
						$lib_sous_categ = $_POST['autre'];
						$sql = 'SELECT MAX(id_sous_categ) as id FROM sous_categorie';
						$result = $bdd -> query($sql);
						$result = $result->fetch(PDO::FETCH_ASSOC);
						$id_sous_categ = $result['id']+1;

						$sql = "INSERT INTO sous_categorie VALUES (:id_sous_categ, :lib_sous_categ, :photo_sous_categ);";
						$req = $bdd -> prepare($sql);
						$res = $req -> execute(array(
								'id_sous_categ' => $id_sous_categ,
								'lib_sous_categ' => $lib_sous_categ,
								'photo_sous_categ' => 'sous categ-'.$lib_sous_categ.'.jpg'
							));
						if (!$res) {
							echo "<h1>Erreur lors de la création de la nouvelle sous_categorie</h1>";
							echo "\nPDO::errorInfo():\n";
   							print_r($req->errorInfo());
   							echo "<p>".
							strtr($sql,array(
									':id_sous_categ' => $id_sous_categ,
									':lib_sous_categ' => $lib_sous_categ,
									':photo_sous_categ' => 'sous categ-'.$lib_sous_categ.'.jpg'
								)).
								"</p>";
   							exit;
						}
					} else {
						$sql = "SELECT lib_sous_categ FROM sous_categorie WHERE id_sous_categ = ".$id_sous_categ.";";
						$result = $bdd -> query($sql);
						$result = $result->fetch(PDO::FETCH_ASSOC);
						$lib_sous_categ = $result['lib_sous_categ'];
					}


				//Récupération des informations du formulaire
					$casier = $_POST['casier'];
					$tiroir = $_POST['tiroir'];
					$quantite = $_POST['quantite'];

					if (intval($_POST['tiroir']) > 0 and intval($_POST['tiroir']) < 51 ){
						if (intval($_POST['tiroir']) > 0 and intval($_POST['tiroir']) < 10 ) {
							$tiroir = '0'.$tiroir;
						}
					}else{
						echo "Le Tiroir est un entier entre 1 et 50";
						exit;
					}

					if (intval($_POST['quantite']) > 0){
						$quantite = intval($_POST['quantite']);
					}else{
						echo "La quantité doit être un entier non nul";
						exit;
					}


					$sql = 'SHOW COLUMNS FROM '.$table.';';
					$value_table=array();
					foreach ($bdd -> query($sql) as $ligne) {
						if (isset($_POST[$ligne['Field']]) and !empty($_POST[$ligne['Field']])) {
	/*						if ($ligne['Type'] == 'int(11)') {

							} else if($ligne['Type'] == 'decimal(15,2)'){

							} else {

							}*/
							$value_table[$ligne['Field']] = $_POST[$ligne['Field']];

						}
					}

					$type = isset($value_table['type']) ? $value_table['type'] : '';
					$photo_prod = $lib_sous_categ.'-'.$type.'.jpg';


				//Récupération du l'id produits
					$sql = 'SELECT MAX(id_produit) as id FROM produits';
					$result = $bdd -> query($sql);
					$result = $result->fetch(PDO::FETCH_ASSOC);
					$id_prod = $result['id']+1;

				//Ajout dans la table produits
					$sql = "INSERT INTO produits VALUES (:id_prod, :photo_prod, :id_sous_categ) ";
					$req = $bdd -> prepare($sql);
					$res = $req -> execute(array(
							'id_prod' => $id_prod,
							'photo_prod' => $photo_prod,
							'id_sous_categ' => $id_sous_categ
						));
					if (!$res) {
						echo "<h1>Erreur lors de l'ajout dans la table produits</h1>";
						echo "\nPDO::errorInfo():\n";
   						print_r($req->errorInfo());
						exit;
					}

				//Ajout dans la table emplacement
					$sql = "INSERT INTO emplacement VALUES (:id_prod, :casier, :tiroir, :quantite) ";
					$req = $bdd -> prepare($sql);
					$res = $req -> execute(array(
							'id_prod' => $id_prod,
							'casier' => $casier,
							'tiroir' => $tiroir,
							'quantite' => $quantite
						));
					if (!$res) {
						echo "<h1>Erreur lors de l'ajout dans la table emplacement</h1>";
						echo "\nPDO::errorInfo():\n";
   						print_r($req->errorInfo());
						exit;
					}

				//Ajout dans la table de la catégorie choisie
					$sql = "INSERT INTO ".$table." (id_produit, ";
					foreach ($value_table as $key => $value) {
						$sql = $sql.$key.", ";
					}
					$sql = substr($sql, 0, -2);
					$sql = $sql.") VALUES (".$id_prod.", ";
					foreach ($value_table as $key => $value) {
						$sql = $sql."'".$value."', ";
					}
					$sql = substr($sql, 0, -2).");";

					$req = $bdd -> prepare($sql);
					$res = $req -> execute();
					if (!$res) {
						echo "<h1>Erreur lors de l'ajout dans la table ".$table."</h1>";
						echo "\nPDO::errorInfo():\n";
   						print_r($req->errorInfo());
   						echo "<br>".$sql;
						exit;
					}

					echo "<h1> Ajout réussi ! </h1>";
					header("Refresh:1 ;url=ajout.php");
			}
		?>
	</div>
</body>
</html>
