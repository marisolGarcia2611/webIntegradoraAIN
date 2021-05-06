<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
		<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>SaveEditUser</title>
</head>
<body>
	
	<div class="container">
		
	<?php

		include 'Database.php';

		$DB = new Database();
		$DB ->ConnectDatabase();
		extract($_POST);
		session_start();
		$ID=$_SESSION["ID"];
	if ($Pass==$Pass2) 
		{
			$PasswordHash=password_hash($Pass,PASSWORD_DEFAULT);
			$Query = "UPDATE usuarios SET NombreUsuario = '$User', Contrasena = '$PasswordHash', TipoUsuario = '$Type' WHERE usuarios.UsuarioID= '$ID'";
			$DB->RunSQL($Query);
			if ($Type=="Empleado" || $Type=="Dueno") 
			{
				$Query ="UPDATE empleados SET Nombre = '$Name', Apellidos = '$LastName', Telefono = '$Phone', Correo = '$Email' WHERE empleados.UsuarioID= '$ID'";
				$DB->RunSQL($Query);
			echo "<div class='alert alert-success'> Usuario Registrado </div>";
			header("refresh:3 AIN2.php");
			}else 
			{
				$Query="UPDATE clientes SET Nombre = '$Name', Apellidos = '$LastName', Telefono = '$Phone', Correo = '$Email' WHERE clientes.UsuarioID= '$ID' ";
							$DB->RunSQL($Query);
			echo "<div class='alert alert-success'> Usuario Registrado </div>";
			header("refresh:3 AIN2.php");
			}
			

		}	
		else 
		{
			echo "<div class='alert alert-danger'> La Contraseña no Coincide </div>";
		}
		header("refresh:3 AIN2.php");
	?>
	</div>




</body>
</html>