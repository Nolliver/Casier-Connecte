<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="css/formajout.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<?php include('connexion.php'); 
		?>

		<div class="row col-md-12">
			<h1 class="text-center col-md-12 display-4">Ajout dans la base de données</h1>
		</div>
		
		<div class="row">
			<form method="POST" action="ajout.php" class="form offset-md-2 col-md-8">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Categorie: </label>
						<div class="form-group">
							<?php 
								$query='select distinct categorie from produits order by categorie;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								$ligne = mysqli_fetch_assoc($result);
								echo "	<div class='input-group mb-3'>
										  <div class='input-group-prepend'>
										    <div class='input-group-text'>
										      <input type='radio' name='categorie' value='".$ligne['categorie']."' checked id='for_".$ligne['categorie']."'>
										    </div>
										  </div>
										  <label for='for_".$ligne['categorie']."' class='form-control'>".$ligne['categorie']."</label>
										</div>";


								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "	<div class='input-group mb-3'>
										  <div class='input-group-prepend'>
										    <div class='input-group-text'>
										      <input type='radio' name='categorie' value='".$ligne['categorie']."' checked id='for_".$ligne['categorie']."'>
										    </div>
										  </div>
										  <label for='for_".$ligne['categorie']."' class='form-control'>".$ligne['categorie']."</label>
										</div>";

								}
							 ?>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Sous-categorie </label>
						<select name="sous_categorie" class="form-control">
							<?php 
								$query='select distinct sous_categorie from produits order by sous_categorie;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "<option value='".$ligne['sous_categorie']."'>".$ligne['sous_categorie']."</option>";
								}
								echo "<option value='autre'>Autre</option>";
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="sous_categorie_autre" class="form-control">
					</div>
				</div>


				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Nom </label>
						<select name="nom" class="form-control">
							<?php 
								$query='select distinct nom from produits order by nom;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "<option value='".$ligne['nom']."'>".$ligne['nom']."</option>";
								}
								echo "<option value='autre'>Autre</option>";
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="nom_autre" class="form-control">
					</div>
				</div>


				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Taille </label>
						<select name="taille" class="form-control">
							<?php 
								$query='select distinct taille from produits order by taille;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "<option value='".$ligne['taille']."'>".$ligne['taille']."</option>";
								}
								echo "<option value='autre'>Autre</option>";
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="taille_autre" class="form-control">
					</div>
				</div>


				<div class="form-row form-group">
					<label>Longueur </label>
					<input type="text" name="longueur" class="form-control">
				</div>


				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Type </label>
						<select name="type" class="form-control">
							<?php 
								$query='select distinct type from produits order by type;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "<option value='".$ligne['type']."'>".$ligne['type']."</option>";
								}
								echo "<option value='autre'>Autre</option>";
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="type_autre" class="form-control">
					</div>
				</div>

				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Nom de l'image </label>
						<select name="nom_icone" class="form-control">
							<?php 
								$query='select distinct nom_icone from produits order by nom_icone;';
								$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));

								while ($ligne = mysqli_fetch_assoc($result)) {
									echo "<option value='".$ligne['nom_icone']."'>".$ligne['nom_icone']."</option>";
								}
								echo "<option value='autre'>Autre</option>";
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="nom_icone_autre" class="form-control">
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Emplacement: </label>
						<select name="emplacement" class="form-control">
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
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="emplacement_autre" class="form-control">
					</div>
				</div>
			
				<input type="hidden" name="quantite" value='1'>

				<?php 
					$query='select id from produits order by id desc limit 1;';
					$result = mysqli_query($connexion, $query) or die ('ERREUR '.mysqli_error($connexion));
					$ligne = mysqli_fetch_assoc($result);

					$id = $ligne['id'] + 1;
				 ?>
				 <input type="hidden" name="id" value=<?php echo "'".$id."'" ?>>
			
				<br>

				<div class="form-row">
					 <input type="submit" value="Ajouter" class="form-control col-md-5">
					 <input type="reset" class="form-control offset-md-2 col-md-5">
				</div>
			</form>
			<?php mysqli_close($connexion);  ?>
		</div>
	</div>

</body>
</html>