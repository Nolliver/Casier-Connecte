<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery.chained.js"></script>
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

			if (!isset($_POST['btn_edit'])) {
        $id = $_GET['id'];
        $table = $_GET['table'];
        $id_sous_categ = $_GET['id_sous_categ'];

				echo "<div class='row col-12 mb-5'>\n";
					echo "<h1 class='text-center col-12 display-4'>Modification</h1>\n";
				echo "</div>\n";

				echo "<div class='row'>\n";
					echo "<form method='POST' action='edit.php?id=".$id."&table=".$table."&id_sous_categ=".$id_sous_categ."' class='offset-2 col-8' name='edit'>\n";
						// Récupération des noms de colonnes de la catégorie choisie
							$sql = 'SHOW COLUMNS FROM '.$table.';';

							$var_categ = array();
							foreach ($bdd -> query($sql) as $ligne) {
								array_push($var_categ, $ligne['Field']);
							}
							unset($var_categ[array_search('id_produit', $var_categ)]);

						//Recherche des colonnes n'étant pas entièrement vide pour la sous catégorie
							$sql = "SELECT * FROM (produits as p inner join $table as t on p.id_produit = t.id_produit) inner join sous_categorie as sc on sc.id_sous_categ = p.id_sous_categ WHERE sc.id_sous_categ = $id_sous_categ";
							$result = $bdd -> query($sql);
							$result = $result->fetchAll(PDO::FETCH_ASSOC);
							$var_not_null = notemptycol($result);


						//On ne garde que l'intersection des variables se trouvant dans la liste des variables de la catégorie choisie, et dans la liste des variables non entièrement vide
							$var = array_intersect($var_categ, $var_not_null);

						// Récupération des infos de l'objet à modifier
							$sql = "SELECT * FROM (produits as p inner join $table as t on p.id_produit = t.id_produit) inner join emplacement as e on e.id_produit = p.id_produit WHERE p.id_produit = $id";
							$result = $bdd -> query($sql);
							$prod = $result->fetchAll(PDO::FETCH_ASSOC);
							$prod = $prod[0];

							foreach ($var as $key => $value) {
								$sql = 'SELECT DISTINCT '.$table.'.'.$value.' from ('.$table.' inner join produits on '.$table.'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ where sous_categorie.id_sous_categ ='.$id_sous_categ.';';

								echo "<div class='row'>\n";
									echo "<div class='form-group col-md-12'>\n";
										echo "<label class='mt- form-label' for='".$value."'>".$nom_col[$value].":</label>\n";
										echo "<input list='list_".$value."' type='text' name='".$value."' value='".$prod[$value]."' class='form-control'>\n";
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
											echo "<option value='".$ligne['id_casier']."' ".($ligne['id_casier']==$prod['id_casier']?"selected":"").">".$ligne['id_casier']."</option>\n";
										}
								echo "</select>\n";
							echo "</div>\n";


							echo "<div class='form-group col-md-6'>\n";
								echo "<label class='mt- form-label' for='tiroir'>Tiroir:</label>\n";
									echo "<input type='text' name='tiroir' class='form-control' required value='".$prod['num']."'>\n";
							echo "</div>\n";
						echo "</div>\n";

						echo "<div class='row'>\n";
							echo "<div class='form-group col-md-12'>\n";
								echo "<label class='mt- form-label' for='quantite'>Quantité:</label>\n";
								echo "<input type='text' name='quantite' class='form-control' required value='".$prod['quantite']."'>\n";
							echo "</div>";
						echo "</div>\n";


						echo "<div class='row mt-3'>\n";
							echo "<div class='col'>\n";
								echo "<a role='button' href='".$_SERVER['HTTP_REFERER']."' class='form-control btn btn-outline-danger'>Retour</a>\n";
							echo "</div>";
							echo "<div class='col'>\n";
									echo "<input type='submit' value='Valider' name='btn_edit' class='form-control btn btn-outline-success'>\n";
							echo "</div>";
						echo "</div>\n";
					echo "</form>\n";
				echo "</div>\n";
			} else {
				//Récupération de la table et sous categorie
					$id = $_GET['id'];
					$table = $_GET['table'];
					$id_sous_categ = $_GET['id_sous_categ'];

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
							$value_table[$ligne['Field']] = $_POST[$ligne['Field']];
						}
					}
					$type = isset($value_table['type']) ? $value_table['type'] : '';

				//Modification dans la table emplacement
					$sql = "UPDATE emplacement SET num = $tiroir, id_casier = '$casier', quantite = $quantite WHERE id_produit = $id";

					$req = $bdd -> prepare($sql);
					$res = $req -> execute();
					if (!$res) {
						echo "<h1>Erreur lors de la modification dans la table emplacement</h1>";
						echo "\nPDO::errorInfo():\n";
   						print_r($req->errorInfo());
						exit;
					}

				//Ajout dans la table de la catégorie choisie
					$sql = "UPDATE $table SET ";
					foreach ($value_table as $key => $value) {
						$sql = $sql."$key = '$value', ";
					}
					$sql = substr($sql, 0, -2)."WHERE id_produit = $id;";

					$req = $bdd -> prepare($sql);
					$res = $req -> execute();
					if (!$res) {
						echo "<h1>Erreur lors de l'ajout dans la table ".$table."</h1>";
						echo "\nPDO::errorInfo():\n";
   						print_r($req->errorInfo());
   						echo "<br>".$sql;
						exit;
					}

					echo "<h1> Modification réussie ! </h1>";
					header("Refresh:1 ;url=edit_del.php?table=$table&sous_categorie=$id_sous_categ");
			}
		?>
	</div>
</body>
</html>
