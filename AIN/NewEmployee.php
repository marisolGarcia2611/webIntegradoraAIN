<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
		<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>Guardar Persona</title>
</head>
<body>
	
	<div class="container">
	<?php

		include 'Database.php';

		$DB = new Database();
		$DB ->ConnectDatabase();
		extract($_POST);
	if ($Pass==$Pass2) 
		{
			$PasswordHash=password_hash($Pass,PASSWORD_DEFAULT);
			$Query = "INSERT INTO usuarios(NombreUsuario,Contrasena,TipoUsuario) VALUES('$User','$PasswordHash','$Type')";
			$ID=$DB->RunSQL($Query);
			if ($Type=="Empleado" || $Type=="Dueno") 
			{
				$Query ="INSERT INTO empleados(Nombre,Apellidos,Telefono,Correo,UsuarioID) VALUES('$Name','$LastName','$Phone','$Email','$ID')";
			}else 
			{
				$Query="INSERT INTO clientes(Nombre,Apellidos,Telefono,Correo,UsuarioID) values('$Name','$LastName','$Phone','$Email','$ID')";
			}
			
			$DB->RunSQL($Query);
			echo "<div class='alert alert-success'> Usuario Registrado </div>";
			header("refresh:3 AIN2.php");
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