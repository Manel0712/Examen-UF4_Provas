
<?php 
	require "header.php";
?>
<?php
			if (!empty($_POST)) {
				$Nombre2 = $_POST["nombre"];
				$Apellidos = $_POST["apellidos"];
				$_SESSION['planta'] = $_POST["planta"];
				$Nombre = "localhost";
				$Usuario = "root";
				$Contraseña = "";
				$Base = "HOTELESMANELMataro";

				$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);

				if ($conn->connect_error) {
					die("ERROR al conectar con la BBDD");
				}

				$Planta = $_SESSION['planta'];

				$sql = "SELECT * from planta$Planta where disponibilidad = 'Si'";

				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

							echo "
							<table class='table'>        
							<tr> 
								<th>Logo</th> 
								<th>Tipologia</th>
								<th>Numero de habitacion</th>
								<th>Assignar</th>
								<th></th>
							</tr>
								";
							echo "<form name='Assignar' method='post' action='form_client.php'>";
							while ($row) {
								$Logo = $row["logo"];
								$Categoria = $row["tipologia"];
								$numero = $row["numero"];
								echo "
								<tr> 
									<td><img class='img-thumbnail mr-2' style='height: 200px;' src='$Logo'></td> 
									<td>$Categoria</td>
									<td>$numero</td>
									<td><input type='radio' name='Assignado' value='$numero'></td>
								</tr>
								";
								$row = $result->fetch_assoc();
			}
			echo "</table>";
			echo "<button class='btn btn-default' type='submit'>Assignar habitacion</button>";
			echo "</form>";
			$conn->close();
		}
			else {
				header("location: form_client.php");
			}
			
?>
	</body>
</html>
