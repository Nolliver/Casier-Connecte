<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventaire</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<style type="text/css">
		html, body{
			height: 100%;
		}
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

	<div class="container h-100 justify-content-center mb-5 d-flex">

		<div class='row h-100 align-items-center col-12'>
			<figure class='col-sm-6 col-md-3'>
				<a class='text-center d-block' href='ajout.php'>
					<img style='width: 12em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/addBDD.jpg'>
					<figcaption class='mx-auto'>Ajouter</figcaption>
				</a>
			</figure>


			<figure class='col-sm-6 col-md-3'>
				<a class='text-center d-block' href='recherche.php'>
					<img style='width: 12em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/rechercher.jpg'>
					<figcaption class='mx-auto'>Rechercher</figcaption>
				</a>
			</figure>


			<figure class='col-sm-6 col-md-3'>
				<a class='text-center d-block' href='edit_del.php'>
					<img style='width: 12em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/modifier.jpg'>
					<figcaption class='mx-auto'>Modifier/Supprimer</figcaption>
				</a>
			</figure>


			<figure class='col-sm-6 col-md-3'>
				<a class='text-center d-block' href='verif.php'>
					<img style='width: 12em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/sans photo.jpg'>
					<figcaption class='mx-auto'>Vérification</figcaption>
				</a>
			</figure>

			<figure class='col-sm-6 col-md-3'>
				<a class='text-center d-block' href='javascript:window.open("http://192.168.1.44/TEST")'>
					<img style='width: 12em ' class='mx-auto rounded img-thumbnail d-block' src='icone500px500px/sans photo.jpg'>
					<figcaption class='mx-auto'>Test</figcaption>
				</a>
			</figure>

		</div>

	</div>
</body>
</html>
