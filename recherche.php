<!DOCTYPE html>
<?php
if (isset($_GET['table']) and isset($_GET['sous_categorie'])) {
    echo "<html lang='fr'>\n";
} else {
    echo "<html lang='fr' class='h-100'>\n";
}
?>
<head>
  <meta charset="UTF-8">
  <title>Recherche</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="fonction.js"></script>

  <link rel="stylesheet" type="text/css" href="recherche.css">

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

<body class="min-vh-100">

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

  		<?php

  		include("connexion.php");
  		include("fonction.php");

  			if (!isset($_GET['table'])){
  				//Recherche des catégories

  					$categ = array(
  						array('nom_table' => "elements_mecaniques", 'Titre' => "Elements mecaniques" , 'nom_photo' => "elements_mecaniques.jpg"),
  						array('nom_table' => "composants_electroniques", 'Titre' => "Composants electroniques" , 'nom_photo' => "composants_electroniques.jpg"),
  						array('nom_table' => "outils", 'Titre' => "Outils" , 'nom_photo' => "outils.jpg"),
  						array('nom_table' => "quincaillerie", 'Titre' => 'Quincaillerie' , 'nom_photo' => 'quincaillerie.jpg')
  					);

  				// Affichage des catégories
  					echo "<div class='row col-12 mb-5'>\n";
  						echo "<h1 class='text-center col-12 display-4'>Recherche</h1>\n";
  					echo "</div>\n";
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
  					echo "<div class='row col-12 mb-5'>\n";
  						echo "<h1 class='text-center col-12 display-4'>Recherche</h1>\n";
  					echo "</div>\n";
  					echo "<div class='container h-100 justify-content-center d-flex mb-5'>\n";
  						echo "<div class='my-auto col-12'>\n";
  							echo "<div class='row align-items-center my-5'>\n";
  								foreach ($bdd -> query($sql) as $ligne) {
  									echo "<figure class='col-sm-6 col-md-3'>\n";
  										echo "<a class='text-center d-block' href='".$_SERVER['REQUEST_URI']."&sous_categorie=".$ligne['id_sous_categ']."'>\n";
  											echo "<img style='width: 12.5em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/sous_categ/".$ligne['nom_photo']."'>\n";
  											echo "<figcaption class='mx-auto'>".$ligne['lib_sous_categ']."</figcaption>\n";
  										echo "</a>\n";
  									echo "</figure>\n";
  								}
  							echo "</div>\n";
  						echo "</div>\n";
  					echo "</div>\n";
  			}



  			if (isset($_GET['table']) and isset($_GET['sous_categorie'])) {
  				// Récupération des noms de colonnes de la sous catégorie choisie
  					$sql = 'SELECT * from '.$_GET['table'].';';
  					$result = $bdd -> query($sql);
  					$var_categ = array_keys($result->fetch(PDO::FETCH_ASSOC));
  					unset($var_categ[array_search('id_produit', $var_categ)]);


  				//Recherche des produits de la sous categorie
  					$sql = 'SELECT * from ((('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ) inner join emplacement on produits.id_produit = emplacement.id_produit) inner join casier on emplacement.id_casier = casier.id_casier where sous_categorie.id_sous_categ ='.$_GET['sous_categorie'];

  				//Recherche des colonnes n'étant pas entièrement vide
  					$result = $bdd -> query($sql.' Order by 2, 3;');
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
  						$result = $bdd -> query($sql.$filtre.' Order by 2, 3;');
  						$result = $result->fetchAll(PDO::FETCH_ASSOC);
  					}

  				// Affichage des produits
  					echo "<div class = container-fluid>\n";
  						echo "<div class='row col-12 p-0 m-0'>\n";
  							echo "<div class='col-xs-6 col-md-2'>\n";
  								//Mis en place des filtres
  								echo "<form class='form col-12 mt-5 px-0 pe-2' method='POST' action='".$_SERVER['REQUEST_URI']."'>\n";
  									echo "<nav class='nav flex-column justify-content-center'>\n";
  									$text_filtres = "";
  									$js_filtre="";
  								  		foreach ($var as $key => $value) {
  								  			$sql = 'SELECT DISTINCT '.$_GET['table'].'.'.$value.' from ('.$_GET['table'].' inner join produits on '.$_GET['table'].'.id_produit = produits.id_produit) inner join sous_categorie on produits.id_sous_categ = sous_categorie.id_sous_categ where sous_categorie.id_sous_categ ='.$_GET['sous_categorie'].' Order by 1;';

  								  			//Création des boutons dropright
  								  			echo "<div class='my-2 btn-group dropdown'>\n";
  									  			echo "<button type='button' class='mx-auto btn btn-secondary dropdown-toggle col-12' data-bs-toggle='dropdown' aria-expanded='false'>\n";
  											    	echo $value;
  											  	echo "</button>\n";
  											  	echo "<ul class='dropdown-menu dropdown-menu-end'>\n";
  											  		$text_filtres = $text_filtres."<li><h6 class='card-subtitle my-2'>".$nom_col[$value].":</h6></li>\n<ul>\n";

  											  		//vérification des filtres selectionnés à cocher
  												  	foreach ($bdd -> query($sql) as $ligne) {
  												  		if (isset($array_filtre[$value]) and !isset($_POST['reset'])){
  												  			if (in_array($ligne[$value], $array_filtre[$value])) {
  													  			$checked = "checked";
  													  			$js_filtre = $js_filtre."<script type='text/javascript'>check_filtre('".$value."-".$ligne[$value]."', 'text_".$ligne[$value]."');</script>\n";
  													  		} else {
  													  			$checked ="";
  												  			}
  												  		} else {
  												  			$checked ="";
  												  		}

  												  		//Mise en place des checkbox pour les filtres
  												  		echo "<div class='ms-2 form-check'>\n";
  												   			echo "<input type='checkbox' name='".$value."[]' id='".$value."-".$ligne[$value]."' value='".$ligne[$value]."' class='form-check-input' ".$checked." onclick='check_filtre(this,\"text_".$ligne[$value]."\")'>\n";
  												   			echo "<label for='".$value."-".$ligne[$value]."' class='form-check-label'>";
  												   				echo is_null($ligne[$value]) ? "(vide)": $ligne[$value];
  												   			echo "</label><br>\n";
  												   		echo "</div>\n";

  												   		//Liste des filtres à afficher si coché
  												   		$text_filtres = $text_filtres."<li class='card-text' id='text_".$ligne[$value]."' style='display:none'>".$ligne[$value]."</li>\n";
  												   	}
  												 	$text_filtres = $text_filtres."</ul>\n";
  												 echo "</ul>\n";
  											echo "</div>\n";
  								  		}
  									echo "</nav>\n";
  									echo "<input type='submit' value='Mettre a jour' class='my-2 col-12 text-center'>\n";
  									echo "<input type='submit' name='reset' value='Réinitialiser' class='my-2 col-12 text-center'>\n";
  								echo "</form>\n";

  								//Affichage des filtres selectionnés
  								echo "<div class='col-12 my-3 px-0'>";
  									echo "<div class='card mt-5'>";
  										echo "<div class='card-body px-0 py-3 w-auto'>";
  											echo "<ul>\n";
  											echo "<h5 class='card-title'>Filtres: </h5>";
  												echo $text_filtres;
  											echo "</ul>\n";
  										echo "</div>\n";
  									echo "</div>\n";
  								echo "</div>\n";
  							echo "</div>\n";




  						//Remplissage du tableau
  							echo "<div class='table-responsive-lg col-10'>\n";
  								echo "<table class='text-center table-hover table table-striped align-middle mt-5'>\n";
  									echo "<tr>\n";
  										echo "<th class='col-1'></th>\n";
  										foreach ($var as $value) {
  											echo "<th>".$nom_col[$value]."</th>\n";
  										}
  										echo "<th class='col-1'>Quantité</th><th class='col-1' >Ajouter/Enlever</th><th class='col-1'>Emplacement</th>\n";
  									echo "</tr>\n";

  									foreach ($result as $ligne) {
  										echo "<tr>\n";
  										echo"<td><img class='rounded border border-secondary' src='icone500px500px/".$ligne['photo_prod']."'></td>\n";
  										foreach ($var as $value) {
  											$val = stristr($ligne[$value], '-')?stristr($ligne[$value], '-', true).'&shy;'.stristr($ligne[$value], '-'):$ligne[$value];
  											echo "<td>".$val."</td>\n";
  										}
  										echo"<td>";
                        echo $ligne['quantite'];
                      echo"</td>";
                      echo"<td>";
                        echo "<form method='POST' action='#' class='row'>";
                          echo "<select class='col-5 mt-3 h-50'>";
                            for ($i=1; $i < 11; $i++) {
                              echo "<option>$i</option>";
                            }
                          echo "</select>";
                          echo "<div class='col-7'>";
                            echo "<input type='submit' id='add' value='Ajouter'>";
                            echo "<input type='submit' id='remove' value='Enlever'>";
                          echo "</div>";
                        echo "</form>";
                      echo "</td>";

  										echo "<td class='align-middle text-center' ><a class='btn btn-primary' role='button' href='javascript:window.open(\"http://".$ligne['adresse_ip'].'/'.$ligne['num']."\")'>Allumer le tiroir <strong>".$ligne['id_casier'].'-'.$ligne['num']."</strong></a></td>\n";
  										echo "</tr>\n";
  									}
  								echo "</table>\n";
  							echo "</div>\n";
  						echo "</div>\n";
  					echo "</div>\n";
  					echo $js_filtre;
  			}

  		 ?>

  </div>
</body>
</html>
