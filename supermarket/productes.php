<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<table class="table">        
					<?php
							$Nombre = "localhost";
							$Usuario = "root";
							$Contraseña = "";
							$Base = "supermercat";
				
							$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);
				
							if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
							}

							if (!empty($_POST)) {
								$codigo = $_POST["codi"];
								$sql2 = "DELETE FROM productes WHERE codi = '$codigo'";
								$result2 = $conn->query($sql2);
							}

							$sql = "SELECT * FROM detall_productes";
				
							$result = $conn->query($sql);
				
							$row = $result->fetch_assoc();

							echo "
							<table class='table'>        
							<tr> 
								<th>Producte</th> 
								<th>Categoria</th>
								<th>Preu</th>
								<th></th>
							</tr>
								";

							while ($row) {
								$identificador = $row["codi"];
								$categoria = $row["nom_categoria"];
								$nom = $row["nom"];
								$precio = $row["preu"];
								$unidades = $row["unitats_stock"];
								echo "<tr> 
								<td class='align-middle'>
									$nom
								</td>
								<td class='align-middle'>$categoria</td>
								<td class='align-middle'>$precio</td>
								<td class='align-middle'>
									<form class='form-inline' action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>
										<a href='form_producte.php?codi=$identificador' class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a>
										<div class='form-group'>
											<input type='hidden' name='codi' value=$identificador />
										</div>
										<button type='submit' class='btn btn-primary'><i class='fas fa-trash-alt'></i></button>
									</form>
								</td> 
							</tr>";
							$row = $result->fetch_assoc();
							}
				
						$conn->close();
						echo "</table>";
						?>
				</table>
			</div>
		</div>
	</body>
</html>
