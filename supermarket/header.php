<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SuperMarket</title>
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fontawesome-all.min.css">
		<script src="js/jquery.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body class="bg-primary">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
				 <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
				SuperMarket
			</a>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link text-primary" href="comprar.php">Comprar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-primary" href="carrito.php">Veure el carrito</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Sobre nosaltres</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Atenció al client</a>
					</li>
					<?php
					session_start();
						if (!empty($_SESSION['user'])) {
							if ($_SESSION['user']==1) {
								echo "<li class='nav-item'>
								<a class='nav-link' href='productes.php'>Gestió de productes</a>
								</li>";
							}
						}
					?>
				</ul>
				<?php
						if (!empty($_SESSION['user']) && !empty($_SESSION['user_name'])) {
							$Usuario = $_SESSION['user_name'];
							echo "<h4 style='color: #FFFFFF'>".$Usuario."</h4>";
							echo "<a href='sortir.php' class='btn btn-outline-primary my-0'>Cerrar Sesion</a>";
						}
						else {
					?>
						<a href="entrar.php" class="btn btn-primary my-0 mx-2">Entrar</a>
						<a href="form_client.php" class="btn btn-outline-primary my-0">Nou client</a>
					<?php
						}
					?>
			</div>
		</nav>