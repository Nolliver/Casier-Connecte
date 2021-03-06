<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suppression</title>
</head>
<body>
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

		echo "<h1> Suppression réussis ! </h1>";
		header("Refresh:1 ;url=".$_SERVER["HTTP_REFERER"]);
	?>
</body>
</html>