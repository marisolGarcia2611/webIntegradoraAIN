<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
			<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>Eliminacion de Usuario</title>
</head>
<body>
	
	<div class="container">
<?php
		include 'Database.php';

		$DB = new Database();
		$DB ->ConnectDatabase();
		extract($_GET);
		switch ($Delete) 
		{
			case '1':
				$Query="DELETE FROM clientes WHERE clientes.UsuarioID = '$id'";
				$DB->RunSQLDelete($Query);
				$Query="DELETE FROM usuarios WHERE usuarios.UsuarioID = '$id'";
				$DB->RunSQLDelete($Query);
				echo "<div class='alert alert-danger'>Eliminacion Exitosa</div>";
				header("refresh:3 AIN2.php");
				break;		
				case '2':
				$Query="DELETE FROM material_proveedor WHERE material_proveedor.MaterialID = '$idMate' and  material_proveedor.ProveedorID = '$idProve'";
				$DB->RunSQLDelete($Query);
				echo "<div class='alert alert-danger'>Eliminacion Exitosa</div>";
				header("refresh:3 AIN2.php");
				break;
				case '3':
				$Query="DELETE FROM empleados WHERE empleados.UsuarioID = '$id'";
				$DB->RunSQLDelete($Query);
				$Query="DELETE FROM usuarios WHERE usuarios.UsuarioID = '$id'";
				$DB->RunSQLDelete($Query);
				echo "<div class='alert alert-danger'>Eliminacion Exitosa</div>";
				header("refresh:3 AIN2.php");
				break;
			default:
				break;
		}
				
	?>

</div>
</body>
</html>