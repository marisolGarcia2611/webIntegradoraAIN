<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
			<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>Eliminacion de Cita</title>
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
				$Query="DELETE FROM citas_pendientes WHERE citas_pendientes.CitasID = '$idci'";
				$DB->RunSQLDelete($Query);
				echo "<div class='alert alert-danger'>Eliminacion Exitosa</div>";
				header("refresh:3 AIN2.php");
				break;
				default:
				echo "<div class='alert alert-warning'>ERROR!!</div>";
				header("refresh:3 AIN2.php");
				break;
				
		}
				
	?>

</div>
</body>
</html>