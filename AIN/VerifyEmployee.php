<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
		<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>VerifyLoginEmployee</title>
</head>
<body>
<div class="container">
	<?php 
		include 'Database.php';
		$DB = new Database();
		$DB -> ConnectDatabase();
		extract($_POST);
		$DB -> VerifyLoginEmployee("$User","$Password");
		$DB -> DisconnectDatabase();
	?>
</div>

</body>
</html>