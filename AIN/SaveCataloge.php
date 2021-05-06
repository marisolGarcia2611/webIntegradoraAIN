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

		extract($_POST);
		$Query="INSERT INTO productos(Nombre,Descripcion,Categoria) values('$Name','$Description','$Category')";
		$id=$DB->RunSQL($Query);
		if ($id>0) 
		{

			move_uploaded_file($_FILES ['Image']['tmp_name'],"../imagenes/AIN-Imagnes/".$id.".png");
			echo "<div class='alert alert-success'> Producto Guardado en el Catalogo </div>";
			header("refresh:3 AIN2.php");
		}
		else
		{
			echo "<div class='alert alert-danger'>Error!! Producto No Guardado!!</div>";
			header("refresh:3 AIN2.php");
		}
		
	?>

	</div>




</body>
</html>