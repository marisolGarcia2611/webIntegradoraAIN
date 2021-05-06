<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
		<script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<title>VerifyLogin</title>
</head>
<body>
<?php
    include 'Database.php';
    $DB = new Database();
    $DB -> ConnectDatabase();
    session_start();
    if (isset($_SESSION["User"])) 
    {
      echo "   <nav class='navbar navbar-light bg-light text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
      <h4 align='right'>Usuario:".$_SESSION["User"]."</h4>
       <a href='CloseSession.php' class='btn-warning btn'>Cerrar Sesion</a>
      </nav>";
    }
?>
<?php
	extract($_GET);
	$SQL = "SELECT * FROM materiales";
	$Table = $DB -> RunSQLUser($SQL);
	echo "<div class='container'>
		      <div class='modal-body'>
		    <form class='login' action='SaveProve.php' method='post'>
		    <div class='form-group'>
		    <h4 text-align: center;>Nuevo Proveedor</h4>
		      </div>
		      <div class='form-group'>
		        <label for='nombre'>Nombre Empresa:</label>
		        <input class= 'form-control' type='text' name='Name'>
		      </div>
		      <div class='form-group'>
		        <label for='APaterno'>Correo Empresa:</label>
		        <input class= 'form-control' type='text' name='Email'> 
		      </div>
		      <div class='form-group'>
		        <label for='nombre'>Telefono:</label>
		        <input class= 'form-control' type='text' name='Phone'>
		      </div>
		      <div class='form-group'>
		        <label for='APaterno'>Direccion Empresa:</label>
		        <input class= 'form-control' type='text' name='Direction'> 
		      </div>";
		      echo "<div class='form-group col-md-4'>
			      <label for='inputState'>Material</label>
			      <select id='inputState' class='form-control' name='idMat'>";
		      foreach ($Table as $Card) 
		      {
			        echo "<option value='".$Card-> MaterialID."'>".$Card-> Nombre."</option>";
		      }			    
		      echo "</select>
			    </div>
		      <div class='modal-footer'>
		        <a href='AIN2.php' class='btn btn-secondary' data-dismiss='modal'>Cerrar</a>
		        <button type='submit' class='btn btn-success' >Continuar</button>
		      </div>

		     </form>
		   
		    </div>
		</div>
		<div class='modal-body'>
		    <form class='login' action='NewMat.php' method='post'>
		    <div class='form-group'>
		    <h4 text-align: center;>Nuevo Material</h4>
		      </div>
		      <div class='form-group'>
		        <label for='nombre'>Nombre del Material:</label>
		        <input class= 'form-control' type='text' name='Name'>
		      </div>
		      <div class='modal-footer'>
		        <a href='AIN2.php' class='btn btn-secondary' data-dismiss='modal'>Cerrar</a>
		        <button type='submit' class='btn btn-success' >Continuar</button>
		      </div>
		      </form>
		      </div>";
		
	
		

?>

</body>
</html>