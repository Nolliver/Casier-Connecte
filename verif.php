<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Vérification</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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
<body>

	<nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid justify-content-end">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarScroll">
				<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
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
				<a class="navbar-brand mx-auto" href="#">Casier Connécté</a>
			</div>
			<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
			</div>
		</div>
	</nav>

	<div class="container justify-content-center mb-5">
		<?php
			include("connexion.php");
			include("fonction.php");

			$sql='SELECT distinct * from casier, tiroir order by id_casier, num';
			$sth = $bdd -> prepare($sql);
			$sth -> execute();
			$emp = $sth->fetchAll(PDO::FETCH_ASSOC);

			foreach ($emp as $key => $value) {
				$num = $value['num'];
				$casier = $value['id_casier'];
				$ip = $value['adresse_ip'];

				echo "<div class='col-12'>\n";
							echo "<div class='row mb-5 col-12'>\n";
								echo "<h1 class='col-4'>Emplacement n°".$casier."-".$num."</h1><a class='btn btn-primary offset-6 col-2 text-center h-75 mt-2' role='button' href='javascript:window.open(\"http://".$ip.'/'.$num."\")'>Allumer le tiroir <strong>".$casier.'-'.$num."</strong></a>\n";

									$sql='SELECT distinct s.id_sous_categ from (sous_categorie as s inner join produits as p on s.id_sous_categ = p.id_sous_categ) inner join emplacement as e on p.id_produit = e.id_produit where e.id_casier = "'.$casier.'" and e.num = "'.$num.'" ;';
									$sth = $bdd -> prepare($sql);
									$sth -> execute();
									$sous_categ = $sth->fetchAll(PDO::FETCH_ASSOC);

									if (count($sous_categ) == 0){
										echo "<div class='col-12'>";
											echo "<ul><li><h3>(Vide)</h3></li></ul>";
										echo "</div>";
									}else{
										foreach ($sous_categ as $key => $value) {
											$id_sous_categ = $value['id_sous_categ'];

											$cat = ["quincaillerie", "composants_electroniques","elements_mecaniques","outils"];
											$i = 0;
											do{
												$sql='SELECT *  from
														((produits as p inner JOIN '.$cat[$i].' as t on p.id_produit = t.id_produit)
													     inner join emplacement as e on p.id_produit = e.id_produit)
													     inner join sous_categorie as s on s.id_sous_categ = p.id_sous_categ
													Where p.id_sous_categ = '.$id_sous_categ.'
													And e.id_casier = "'.$casier.'"
													And e.num = "'.$num.'";';

												$sth = $bdd -> prepare($sql);
												$sth -> execute();
												$prod = $sth->fetchAll(PDO::FETCH_ASSOC);

												$i = $i + 1;
											}while ((count($prod) == 0) and ($i<4));

											$var= array_keys($prod[0]);

											unset($var[array_search('id_produit', $var)]);
											unset($var[array_search('photo_prod', $var)]);
											unset($var[array_search('id_sous_categ', $var)]);
											unset($var[array_search('id_casier', $var)]);
											unset($var[array_search('num', $var)]);
											unset($var[array_search('quantite', $var)]);
											unset($var[array_search('lib_sous_categ', $var)]);
											unset($var[array_search('nom_photo', $var)]);

											$var_not_null = notemptycol($prod);
											$var = array_intersect($var, $var_not_null);




											echo "<div class='table-responsive-lg col-12'>\n";
												echo "<ul>";
													echo "<li><h3>".$prod[0]['lib_sous_categ']."</h3></li>";
													echo "<table class='text-center table-hover table table-striped align-middle'>\n";
														echo "<tr>\n";
															echo "<th class='col-1'></th>\n";
															foreach ($var as $value) {
																echo "<th>".$nom_col[$value]."</th>\n";
															}
															echo "<th>Quantité</th>\n";
														echo "</tr>\n";

														foreach ($prod as $ligne) {
															echo "<tr>\n";
															echo"<td><img class='rounded border border-secondary' src='icone500px500px/".$ligne['photo_prod']."'></td>\n";
															foreach ($var as $value) {
																$val = stristr($ligne[$value], '-')?stristr($ligne[$value], '-', true).'&shy;'.stristr($ligne[$value], '-'):$ligne[$value];
																echo "<td>".$val."</td>\n";
															}
															echo"<td>".$ligne['quantite']."</td>\n";
															echo "</tr>\n";
														}
													echo "</table>\n";
												echo "</ul>";
											echo "</div>\n";
										}
									}
							echo "</div>\n";
						echo "</div>\n";
			}

		 ?>
	</div>

</body>
</html>
