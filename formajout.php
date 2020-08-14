<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout</title>
	<link rel="stylesheet" type="text/css" href="css/formajout.css">
</head>
<body>
	<?php include('connexion.php'); 
	?>




<h1>Ajout dans la base de données</h1>

	<form method="POST" action="ajout.php">

		<label>Categorie: </label>
			<?php 
				$query='select distinct categorie from produits order by categorie;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				$ligne = mysqli_fetch_assoc($result);
				echo "<input type='radio' name='categorie' value='".$ligne['categorie']."' checked id='for_".$ligne['categorie']."'><label for='for_".$ligne['categorie']."' class='radio'>".$ligne['categorie']."</label>";

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<input type='radio' name='categorie' value='".$ligne['categorie']."' id='for_".$ligne['categorie']."'><label for='for_".$ligne['categorie']."' class='radio'>".$ligne['categorie']."</label>";
				}
			 ?>
		
		<br>

		<label>Sous-categorie: </label>
		<select name="sous_categorie">
			<?php 
				$query='select distinct sous_categorie from produits order by sous_categorie;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<option value='".$ligne['sous_categorie']."'>".$ligne['sous_categorie']."</option>";
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="sous_categorie_autre">

		<br>


		<label>Nom: </label>
		<select name="nom">
			<?php 
				$query='select distinct nom from produits order by nom;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<option value='".$ligne['nom']."'>".$ligne['nom']."</option>";
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="nom_autre">

		<br>


		<label>Taille: </label>
		<select name="taille">
			<?php 
				$query='select distinct taille from produits order by taille;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<option value='".$ligne['taille']."'>".$ligne['taille']."</option>";
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="taille_autre">

		<br>

		<label>Longueur: </label>
		<input type="text" name="longueur">

		<br>

		<label>Type: </label>
		<select name="type">
			<?php 
				$query='select distinct type from produits order by type;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<option value='".$ligne['type']."'>".$ligne['type']."</option>";
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="type_autre">

		<br>
	
		<label>Nom de l'image: </label>
		<select name="nom_icone">
			<?php 
				$query='select distinct nom_icone from produits order by nom_icone;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				while ($ligne = mysqli_fetch_assoc($result)) {
					echo "<option value='".$ligne['nom_icone']."'>".$ligne['nom_icone']."</option>";
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="nom_icone_autre">

		<br>
		
		<label>Emplacement: </label>
		<select name="emplacement">
			<?php 
				$query='select distinct emplacement from produits order by emplacement;';
				$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

				$i=0;
				while ($ligne = mysqli_fetch_assoc($result)) {
					$tab_emp[$i]=$ligne['emplacement'];
					$i = $i + 1;
				}

				for ($i=1; $i < 15; $i++) {
					if (!(in_array($i, $tab_emp))){
						echo "<option value='".$i."'>".$i."</option>";
					}
				}
				echo "<option value='autre'>Autre</option>";
			 ?>
		</select>
		<label class='autre'>autre: </label>
		<input type="text" name="emplacement_autre">
	
		<input type="hidden" name="quantite" value='1'>

		<?php 
			$query='select id from produits order by id desc limit 1;';
			$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));
			$ligne = mysqli_fetch_assoc($result);

			$id = $ligne['id'] + 1;
		 ?>
		 <input type="hidden" name="id" value=<?php echo "'".$id."'" ?>>
	
		<br>

		<div>
			 <input type="submit" value="Ajouter">
			 <input type="reset">
		</div>
	</form>

<?php mysqli_close($connexion);  ?>

</body>
</html>