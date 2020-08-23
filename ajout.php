<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajout en cours</title>
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
			$erreur = array();

			include('connexion.php');

			//Récupération des infos du formulaire (hors variable avec 'autre' possible)
				$id = $_POST['id'];
				$longueur = $_POST['longueur'];
				$quantite = $_POST['quantite'];
				$categorie = $_POST['categorie'];




			//Récupération des infos ou autre est possible et verification des erreurs
			$var = array('sous_categorie' => '', 'nom' => '', 'taille' => '', 'type' => '', 'nom_icone' => '', 'emplacement' => '' );

			foreach ($var as $key => $value) {
				if ($_POST[$key]=='autre'){
					if ($_POST[$key.'_autre'] == '') {
						array_push($erreur, 'Valeur manquante dans la case autre correspondant à: '.$key);
					}
					$var[$key] = $_POST[$key.'_autre'];
				} else {
					$var[$key] = $_POST[$key];
				}
			}

			//Verification erreur longueur
				if (!empty($longueur)) {
					$longueur = intval($longueur);

					if ($longueur == 0 or $longueur > 140) {
						array_push($erreur, 'La longueur doit être un entier compris entre 1 et 140 mm');
					}
				}
				

			//Verification erreur emplacement
				if (strlen($var['emplacement']) != 3 ){
					array_push($erreur, "L'emplacement doit être composé de 3 caractères (exemple de format: A02)");
				} else {
					$casier = substr($var['emplacement'], 0, 1);
					if (!(in_array($casier, range('A', 'Z') ))) {
						array_push($erreur, "Le premier caractère de l'emplacement doit obligatoirement être une lettre (exemple de format: A02)");
					}

					$emplacement = substr($var['emplacement'], 1, 2);
					if (!(in_array($emplacement, range('01', '50') ))) {
						array_push($erreur, "Les deux derniers caractères de l'emplacement doivent obligatoirement être un nombre compris entre 01 et 50 (exemple de format: A02)");
					}
				}


			if ($erreur == array()) {
				$sql ='INSERT INTO produits (`nom`, `emplacement`, `casier`, `categorie`, `sous_categorie`, `longueur`, `quantite`, `taille`, `type`, `nom_icone`) VALUES ("'.$var['nom'].'","'.$emplacement.'","'.$casier.'","'.$categorie.'","'.$var['sous_categorie'].'","'.$longueur.'","'.$quantite.'","'.$var['taille'].'","'.$var['type'].'","'.$var['nom_icone'].'")';
			

				$bdd -> prepare($sql);
				$nb = $bdd -> exec($sql);


				if ($nb == 1) {
					echo '<div class="container h-100 d-flex justify-content-center">
		    				<div class="jumbotron my-auto">
		    					<h1 class="text-center display-3">Ajout réussi !</h1>
		    				</div>
		    			</div>';
				} else {
					echo '<div class="container h-100 d-flex justify-content-center">
		    				<div class="jumbotron my-auto">
		    					<h1 class="text-center display-3">Un problème inconnu est survenu<br>Veuillez réessayer</h1>
		    				</div>
		    			</div>';
				}

				header('Refresh: 1, URL=formajout.php');
				exit();
			} else {
				echo '<div class="container h-100 d-flex justify-content-center">
		    				<div class="jumbotron my-auto">
		    					<h1 class="text-center">Un problème est survenu<br>Veuillez réessayer</h1>';
		    	foreach ($erreur as $value) {
		    		echo "		<ul>
		    						<li>".$value."</li>
		    					</ul>";
		    	}
		    	echo "			<a href='formajout.php' class='btn btn-outline-info d-block col-4 mx-auto' role='button'>Réessayer</a>
		    				</div>
		    		</div>";
			}
			
		 ?>
 	
</body>
</html>