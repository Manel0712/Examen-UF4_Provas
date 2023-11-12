<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto col-4 offset-4 text-white">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
				<div class="form-group">
					<label for="username">Nom d'usuari:</label>
					<input type="text" class="form-control" name="username" id="username" />
				</div>
				<div class="form-group">
					<label for="pass">Contrasenya:</label>
					<input type="password" class="form-control" name="pass" id="pass" />
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
			</form>
		</div>
		<?php
			if (!empty($_POST)) {
				$Usuari = $_POST["username"];
				$Password = $_POST["pass"];
				$Nombre = "localhost";
				$Usuario = "root";
				$Contraseña = "";
				$Base = "supermercat";

				$conn = new mysqli($Nombre, $Usuario, $Contraseña, $Base);

				if ($conn->connect_error) {
					die("ERROR al conectar con la BBDD");
				}

				$sql = "SELECT * FROM clients WHERE nom_usuari like '$Usuari' AND contrasenya like '$Password'";

				$result = $conn->query($sql);

				$row = $result->fetch_assoc();

				if ($result) {
					if ($result->num_rows > 0) {
						session_start();
						$_SESSION['user'] = $row["id_client"];
						$_SESSION['user_name'] = $row["nom"]." ".$row["cognoms"];
						Header("location: comprar.php");
					}
					else {
						echo "Usuario y/o Contraseña incorrectos";
					}
				}
				$conn->close();
			}
		?>
	</body>
</html>
