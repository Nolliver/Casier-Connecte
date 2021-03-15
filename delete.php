<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suppression</title>
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
  
	<?php
		include("connexion.php");
		include("fonction.php");

		$id = $_GET['id'];
		$id_sous_categ = $_GET['id_sous_categ'];
		$table = $_GET['table'];

		$sql = "DELETE FROM produits WHERE id_produit = :id_prod";
		$req = $bdd -> prepare($sql);
		$res = $req -> execute(array(
				'id_prod' => $id
			));
		if (!$res) {
			echo "<h1>Erreur lors de la suppression dans la table produits</h1>";
			echo "\nPDO::errorInfo():\n";
				print_r($req->errorInfo());
			exit;
		}


		$sql = "SELECT count(*) as nb
				FROM (sous_categorie as s INNER JOIN produits as p on s.id_sous_categ = p.id_sous_categ) INNER JOIN ".$table." as t on p.id_produit = t.id_produit
				WHERE s.id_sous_categ = ".$id_sous_categ.";";
		$req = $bdd -> prepare($sql);
		$res = $req -> execute();
		if (!$res) {
			echo "<h1>Erreur lors de la suppression dans la table sous categorie</h1>";
			echo "\nPDO::errorInfo():\n";
				print_r($req->errorInfo());
			exit;
		}
		$tab = $req->fetch();

		if ($tab['nb'] == 0) {
			$sql = "DELETE FROM sous_categorie WHERE id_sous_categ = :id_sous_categ";
			$req = $bdd -> prepare($sql);
			$res = $req -> execute(array(
					'id_sous_categ' => $id_sous_categ,
				));
			if (!$res) {
				echo "<h1>Erreur lors de la suppression dans la table sous categorie</h1>";
				echo "\nPDO::errorInfo():\n";
					print_r($req->errorInfo());
				exit;
			}
			echo "<h1> Suppression réussis ! </h1>";
			header("Refresh:1 ;url=index.php");
			exit;
		}

		echo "<h1> Suppression réussie ! </h1>";
		header("Refresh:1 ;url=".$_SERVER["HTTP_REFERER"]);
	?>
</body>
</html>
