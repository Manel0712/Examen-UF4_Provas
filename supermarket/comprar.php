<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="row">
				<div class="col-2 offset-1">
					<div class="list-group">
						<a href="comprar.php?cat=1" class="list-group-item list-group-item-action">Arròs</a>
						<a href="comprar.php?cat=2" class="list-group-item list-group-item-action">Begudes</a>
						<a href="comprar.php?cat=3" class="list-group-item list-group-item-action">Drogueria</a>
						<a href="comprar.php?cat=4" class="list-group-item list-group-item-action">Conserves</a>
						<a href="comprar.php?cat=5" class="list-group-item list-group-item-action">Esmorzars</a>
						<a href="comprar.php?cat=6" class="list-group-item list-group-item-action">Mascotes</a>
						<a href="comprar.php?cat=7" class="list-group-item list-group-item-action">Lactis i ous</a>
						<a href="comprar.php?cat=8" class="list-group-item list-group-item-action">Llegums</a>
						<a href="comprar.php?cat=9" class="list-group-item list-group-item-action">Oli, vinagre i sal</a>
						<a href="comprar.php?cat=10" class="list-group-item list-group-item-action">Pasta</a>
						<a href="comprar.php?cat=11" class="list-group-item list-group-item-action">Salses i espècies</a>
						<a href="comprar.php?cat=12" class="list-group-item list-group-item-action">Snacks i aperitius</a>
						<a href="comprar.php?cat=13" class="list-group-item list-group-item-action">Sopa i puré</a>
					</div>
				</div>
				<div class="col-8">
					<?php
							$Nombre = "localhost";
							$Usuario = "root";
							$Contraseña = "";
							$Base = "supermercat";
				
							$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);
				
							if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
							}

							if (!empty($_GET)) {

								$numero_categoria = $_GET["cat"];

								$sql = "SELECT * FROM detall_productes WHERE codi_categoria = $numero_categoria";
				
								$result = $conn->query($sql);
					
								$row = $result->fetch_assoc();

								$categoria = $row["nom_categoria"];

								echo "
									<h3 class='text-white'>$categoria</h3>
									<table class='table'>        
										<tr> 
											<th>Producte</th> 
											<th>Categoria</th>
											<th class='text-right'>Preu</th>
											<th></th>
										</tr>
								";

								while ($row) {
									$identificador = $row["codi"];
									$categoria = $row["nom_categoria"];
									$nom = $row["nom"];
									$precio = $row["preu"];
									$unidades = $row["unitats_stock"];
									$imagen = $row["imatge"];
									echo "<tr> 
									<td class='align-middle'>
										<img src='$imagen' class='img-thumbnail mr-2' style='height: 50px;' />
										$nom
									</td>
									<td class='align-middle'>$categoria</td>
									<td class='align-middle text-right'>$precio</td>
									<td class='align-middle'>
										<form class='form-inline' action='carrito.php' method='post'>
											<div class='form-group'>
												<input type='hidden' name='codi' value=$identificador />
												<input type='number' class='form-control form-control-sm mr-2' name='quantitat' min='1' value='1' style='width: 50px;' />
											</div>
											<button type='submit' class='btn btn-primary'><i class='fas fa-cart-plus'></i></button>
										</form>
									</td> 
								</tr>";
								$row = $result->fetch_assoc();
								}
							}
							else {

							$sql = "SELECT * FROM detall_productes";
				
							$result = $conn->query($sql);
				
							$row = $result->fetch_assoc();

							echo "
									<h3 class='text-white'>Els nostres productes</h3>
									<table class='table'>        
										<tr> 
											<th>Producte</th> 
											<th>Categoria</th>
											<th class='text-right'>Preu</th>
											<th></th>
										</tr>
								";

							while ($row) {
								$identificador = $row["codi"];
								$categoria = $row["nom_categoria"];
								$nom = $row["nom"];
								$precio = $row["preu"];
								$unides = $row["unitats_stock"];
								$imagen = $row["imatge"];
								echo "<tr> 
								<td class='align-middle'>
									<img src='$imagen' class='img-thumbnail mr-2' style='height: 50px;' />
									$nom
								</td>
								<td class='align-middle'>$categoria</td>
								<td class='align-middle text-right'>$precio</td>
								<td class='align-middle'>
									<form class='form-inline' action='carrito.php' method='post'>
										<div class='form-group'>
											<input type='hidden' name='codi' value=$identificador />
											<input type='number' class='form-control form-control-sm mr-2' name='quantitat' min='1' value='1' style='width: 50px;' />
										</div>
										<button type='submit' class='btn btn-primary'><i class='fas fa-cart-plus'></i></button>
									</form>
								</td> 
							</tr>";
							$row = $result->fetch_assoc();
							}
						}
				
						$conn->close();
						echo "</table>";
						?>
				</div>
			</div>
		</div>
	</body>
</html>
