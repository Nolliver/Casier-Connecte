<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<style type="text/css">
		html, body{
			height: 100%;
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


			echo '<div class="container h-100 d-flex justify-content-center">
    				<div class="jumbotron my-auto">
    					<h1 class="text-center display-3">Ajout Réussi !</h1>
    				</div>
    			</div>';

			header('Refresh: 1, URL=formajout.php');
			exit();
		 ?>
 	
</body>
</html>