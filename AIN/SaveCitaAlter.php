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
			
		$Query ="UPDATE citas_pendientes SET Direccion = '$Direccion', Fecha = '$Fecha', Hora = '$Hora', Ciudad = '$Ciudad', Asunto = '$Asunto' WHERE citas_pendientes.CitasID = '$ID'";
		$DB->RunSQL($Query);
		echo "<div class='alert alert-success'> Cita Actualizada </div>";
		header("refresh:3 index.php");
			
			

	?>
	</div>




</body>
</html>