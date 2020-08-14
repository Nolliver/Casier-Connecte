<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		html{
			height: 100%;
		}

		body{
			width: 100%;
			height: 100%;
		}

		h1 {
			text-align: center;
			position:absolute;
		    top: 50%;
		    width: 100%;
		    margin-top: -100px;
		    font-size: 4em;
		}

	</style>
</head>
<body>	

<?php 
	include('connexion.php');

	$id = $_POST['id'];
	$longueur = $_POST['longueur'];
	$quantite = $_POST['quantite'];
	$categorie = $_POST['categorie'];

	$var = array('sous_categorie' => '', 'nom' => '', 'taille' => '', 'type' => '', 'nom_icone' => '', 'emplacement' => '' );

	foreach ($var as $key => $value) {
		if ($_POST[$key]=='autre'){
			$var[$key] = $_POST[$key.'_autre'];
		} else {
			$var[$key] = $_POST[$key];
		}
	}

	$query='INSERT INTO produits VALUES ('.$id.',"'.$var['nom'].'","'.$var['emplacement'].'","'.$categorie.'","'.$var['sous_categorie'].'","'.$longueur.'","'.$quantite.'","'.$var['taille'].'","'.$var['type'].'","'.$var['nom_icone'].'")';
	

	$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

	mysqli_close($connexion); 


	echo '<h1>Ajout Réussi !</h1>';

	header('Refresh: 1, URL=formajout.php');
	exit();
 ?>
 	
</body>
</html>