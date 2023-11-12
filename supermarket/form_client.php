<?php 
	require "header.php";
?>
<?php
	if (!empty($_POST)) {
				$Nombre = "localhost";
				$Usuario = "root";
				$Contraseña = "";
				$Base = "HOTELESMANELMataro";

				$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);

				if ($conn->connect_error) {
					die("ERROR al conectar con la BBDD");
				}

				$Planta = $_SESSION['planta'];

				$numero = $_POST["Assignado"];

				$sql = "update planta$Planta set disponibilidad = 'No' where numero = '$numero'";

				$result = $conn->query($sql);

	}
?>
		<div class="container m-5 mx-auto text-white">
			<form action="form_client copy.php" method="post">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="nombre">Nom (obligatori):</label>
							<input type="text" class="form-control" name="nombre" id="nombre" />
						</div>
						<div class="form-group">
							<label for="apellidos">Cognoms (obligatori):</label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" />
						</div>
						<div class="form-group">
							<label for="planta">planta (obligatori):</label>
							<input type="numero" class="form-control" name="planta" id="planta" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php	
		if (!empty($Errores) && $Errores!="Hola") {
			echo $Errores;
		}	
		?>
	</body>
</html>
