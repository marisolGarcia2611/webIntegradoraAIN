<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
			<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>Guardar Catalogo</title>
</head>
<body>
	
	<div class="container">
<?php
		include 'Database.php';

		$DB = new Database();
		$DB ->ConnectDatabase();

		extract($_GET);
		$Query="DELETE FROM productos WHERE productos.ProductoID = '$id'";
		$DB->RunSQLDelete($Query);
			echo "<div class='alert alert-danger'>Eliminacion Exitosa</div>";
			header("refresh:3 AIN2.php");		
	?>

</div>
</body>
</html>