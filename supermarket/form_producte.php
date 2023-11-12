<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto text-white">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4 offset-4">
						<?php
						if (!empty($_POST)) {
							$Nombre = "localhost";
							$Usuario = "root";
							$Contraseña = "";
							$Base = "supermercat";

							$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);

							if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
							}

							$identificador = $_POST["codi"];
							$nom = $_POST["nom"];
							$precio = $_POST["preu"];
							$unidades = $_POST["stock"];

							$sql = "UPDATE productes SET nom = '$nom', preu = $precio, unitats_stock = $unidades WHERE codi= '$identificador'";

							$result = $conn->query($sql);
						}
						?>
						<?php
							$Nombre = "localhost";
							$Usuario = "root";
							$Contraseña = "";
							$Base = "supermercat";
				
							$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);
				
							if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
							}

							if (empty($_POST)) {
								$codigo = $_GET["codi"];
							}
							else {
								$codigo = $_POST["codi"];
							}

							$sql = "SELECT * FROM productes where codi like '$codigo'";

							$result = $conn->query($sql);

							$row = $result->fetch_assoc();
				
							$identificador = $row["codi"];
							$nom = $row["nom"];
							$precio = $row["preu"];
							$unidades = $row["unitats_stock"];
							echo "
							<div class='form-group'>
							<label for='codi'>Codi:</label>
							<input type='text' class='form-control' name='codi' id='codi' value='$identificador' />
						</div>
						<div class='form-group'>
							<label for='nom'>Nom:</label>
							<input type='text' class='form-control' name='nom' id='nom' value='$nom' />
						</div>
						<div class='form-group'>
							<label for='preu'>Preu:</label>
							<input type='number' class='form-control' name='preu' id='preu' value='$precio' />
						</div>
						<div class='form-group'>
							<label for='stock'>Unitats en stock:</label>
							<input type='number' class='form-control' name='stock' id='stock' value='$unidades' />
						</div>
						<div class='form-group text-right'>
							<a href='productes.php' class='btn btn-outline-secondary mx-2'>Tornar</a>
							<button type='submit' class='btn btn-default'>Guardar</button>
						</div>
						";
						?>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
