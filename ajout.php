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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery.chained.js"></script>
</head>
<body>
	<div class="container mb-5">
		<?php include("connexion.php");

		$categ = "";
		if (isset($_POST['categorie']) and !empty($_POST['categorie'])){
			$categ = $_POST['categorie'];
		} else
		;?>

		<div class="row col-md-12 mb-5">
			<h1 class="text-center col-md-12 display-4">Ajout dans la base de données</h1>
		</div>
		
		<div class="row">
			<form method="POST" action="ajout.php" class="form offset-md-2 col-md-8" name="ajout">

				<div class="form-row">
					<div class="form-group col-md-12">
						<label>Categorie </label>
						<select id="categorie" name="categorie" class="form-control" onchange="submit()">
							<option value="">------- Choisissez une catégorie -------</option>
							<option value="quincaillerie" <?php if($categ == "quincaillerie"){echo "selected";}  ?> >Quincaillerie</option>
							<option value="outils" <?php if($categ == "outils" ){echo "selected";}  ?> >Outils</option>
							<option value="composants_electroniques" <?php if($categ == "composants_electroniques" ){echo "selected";}  ?> >Composants éléctroniques</option>
							<option value="elements_mecaniques" <?php if($categ == "elements_mecaniques"){echo "selected";}  ?> >Eléments mécaniques</option>
						</select>
					</div>
				</div>


				<?php 
					if (isset($_POST['categorie']) and !empty($_POST['categorie'])){
						echo "<div class='form-row'>\n";
							echo "<div class='form-group col-md-6'>\n";
								echo "<label>Sous-categorie </label>\n";
								echo "<select id='sous_categorie' name='sous_categorie' class='form-control'>\n";

										$sql="SELECT distinct sous_categorie.id_sous_categ, lib_sous_categ FROM (sous_categorie INNER JOIN produits on produits.id_sous_categ = sous_categorie.id_sous_categ) INNER JOIN ".$categ." on ".$categ.".id_produit = produits.id_produit;";

										foreach ($bdd -> query($sql) as $ligne) {
											echo "<option value='".$ligne['id_sous_categ']."' >".$ligne['lib_sous_categ']."</option>\n";
										}
										echo "<option value='autre'>Autre</option>\n";

								echo "</select>\n";
							echo "</div>\n";
							echo "<div class='form-group col-md-6'>\n";
								echo "<label>Autre </label>\n";
								echo "<input type='text' name='sous_categorie_autre' class='form-control'>\n";
							echo "</div>\n";
						echo "</div>\n";

					} 


				 ?>
				<!-- <div class="form-row">
					<div class="form-group col-md-6">
						<label>Sous-categorie </label>
						<select id="sous_categorie" name="sous_categorie" class="form-control">
							<?php
/*								$sql='SELECT distinct sous_categorie.id, sous_categorie.libelle, produits.categorie from sous_categorie inner join produits on sous_categorie.id = produits.sous_categorie order by libelle;';

								$chainSc = '';
								foreach ($bdd -> query($sql) as $ligne) {
									echo "<option value='".$ligne['id']."' data-chained='".$ligne['categorie']."'>".$ligne['libelle']."</option>";
									$chainSc = $chainSc.' '.$ligne['id'];
								}
								echo "<option value='autre' data-chained='".$chainSc." autre'>Autre</option>";*/
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
						<select id="nom" name="nom" class="form-control">
							<?php 
/*								$sql='SELECT distinct nom, sous_categorie from produits order by nom;';

								foreach ($bdd -> query($sql) as $ligne) {
									echo "<option value='".$ligne['nom']."' data-chained='".$ligne['sous_categorie']."'>".$ligne['nom']."</option>";
								}
								echo "<option value='autre' data-chained='".$chainSc." autre'>Autre</option>";*/
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
						<select id='taille' name="taille" class="form-control">
							<?php 
								/*$sql='SELECT distinct taille, sous_categorie from produits order by taille;';

								echo "<option value='' data-chained='".$chainSc." autre'></option>";
								foreach ($bdd -> query($sql) as $ligne) {
									if ($ligne['taille'] != '') {
										echo "<option value='".$ligne['taille']."' data-chained='".$ligne['sous_categorie']."'>".$ligne['taille']."</option>";
									}
								}
								echo "<option value='autre' data-chained='".$chainSc." autre'>Autre</option>";*/
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
						<select id="type" name="type" class="form-control">
							<?php 
/*								$sql='SELECT distinct type, sous_categorie from produits order by type;';

								echo "<option value='' data-chained='".$chainSc." autre'></option>";
								foreach ($bdd -> query($sql) as $ligne) {
									if ($ligne['type'] != '') {
										echo "<option value='".$ligne['type']."' data-chained='".$ligne['sous_categorie']."'>".$ligne['type']."</option>";	
									}
								}
								echo "<option value='autre' data-chained='".$chainSc." autre'>Autre</option>";*/
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
/*								$sql='SELECT distinct nom_icone from produits order by nom_icone;';

								foreach ($bdd -> query($sql) as $ligne) {
									echo "<option value='".$ligne['nom_icone']."'>".$ligne['nom_icone']."</option>";
								}
								echo "<option value='autre'>Autre</option>";*/
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
/*								$sql='SELECT distinct casier, emplacement from produits order by casier, emplacement;';

								$i=0;
								$j=0;
								foreach ($bdd -> query($sql) as $ligne) {
									$tab_emp[$i]=$ligne['casier'].'-'.$ligne['emplacement'];
									$tab_lettre[$j]=$ligne['casier'];
									$i = $i + 1;
								}


								foreach ($tab_lettre as $lettre) {
									for ($i=1; $i < 51; $i++) {
										if (strlen($i)<2) {
											$i = '0'.$i;
										}
										if (!(in_array($lettre.'-'.$i, $tab_emp))){
											echo "<option value='".$lettre.$i."'>".$lettre.$i."</option>";
										}
									}
								}
								
								echo "<option value='autre'>Autre</option>";*/
							 ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Autre </label>
						<input type="text" name="emplacement_autre" class="form-control">
					</div>
				</div> -->
			
				<input type="hidden" name="quantite" value='1'>

				<div class="form-row">
					<a role="button" href='index.php' class="form-control col-md-5 btn btn-outline-danger">Abandonner</a>
					<input type="submit" value="Ajouter" class="form-control btn btn-outline-success offset-md-2 col-md-5">
				</div>

			</form>
		</div>
	</div>

<!-- <script type="text/javascript">
	$("#nom").chained("#sous_categorie");
	$("#taille").chained("#sous_categorie");
	$("#type").chained("#sous_categorie");
	$("#sous_categorie").chained("#categorie");
</script> -->

</body>
</html>