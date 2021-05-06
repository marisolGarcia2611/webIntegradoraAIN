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
	$DB ->ConnectDatabase();
	extract($_GET);
	if ($Tipe==1) 
	{
	$SQL = "SELECT * FROM usuarios INNER JOIN clientes ON clientes.UsuarioID = usuarios.UsuarioID WHERE usuarios.UsuarioID=$id";
	$p1=1;
	}elseif ($Tipe==2) 
	{
		$SQL = "SELECT * FROM usuarios INNER JOIN empleados ON empleados.UsuarioID = usuarios.UsuarioID WHERE usuarios.UsuarioID=$id";
		$p1=1;
	}elseif ($Tipe==3) 
	{
		$SQL ="SELECT * FROM citas_pendientes INNER JOIN clientes ON clientes.ClienteID=citas_pendientes.ClienteID WHERE citas_pendientes.CitasID= $idci";
		$p1=2;
	}		
	$Table = $DB -> RunSQLUser($SQL);
	if ($p1==1) 
	{
	 foreach ($Table as $Row)
    	{
			echo "<div class='container'>
			      <div class='modal-body'>
			    <form class='login' action='SaveEditUser.php' method='post'>
			    <div class='form-group'>
			    <h4 text-align: center;>Editar</h4>
			    <input class= 'form-control' type='hidden' name='ID' value='$id'>
			      </div>
			      <div class='form-group'>
			        <label for='nombre'>Nombre:</label>
			        <input class= 'form-control' type='text' value='".$Row -> Nombre."' name='Name'>
			      </div>
			      <div class='form-group'>
			        <label for='APaterno'>Apellidos:</label>
			        <input class= 'form-control' type='text' value='".$Row -> Apellidos."' name='LastName'> 
			      </div>
			      <div class='form-group'>
			        <label for='nombre'>Telefono:</label>
			        <input class= 'form-control' type='text' value='".$Row -> Telefono."' name='Phone'>
			      </div>
			      <div class='form-group'>
			        <label for='APaterno'>Correo Electronico:</label>
			        <input class= 'form-control' type='text' value='".$Row -> Correo."' name='Email'> 
			      </div>
			      <div class='form-group'>
			        <label for='nombre'>Usuario:</label>
			        <input class= 'form-control' type='text' value='".$Row -> NombreUsuario."' name='User'>
			      </div>
			      <div class='form-group'>
			        <label for='APaterno'>Contraseña:</label>
			        <input class= 'form-control' type='password' name='Pass'> 
			      </div>
			      <div class='form-group'>
			        <label for='APaterno'>Contraseña:</label>
			        <input class= 'form-control' type='password' name='Pass2'> 
			      </div>
			      <div class='form-check form-check-inline'>
			        <input class='form-control' type='hidden' name='Type' value='".$Row -> TipoUsuario."'>
			      </div>
			      <div class='modal-footer'>
			        <a href='AIN2.php' class='btn btn-secondary' data-dismiss='modal'>Cerrar</a>
			        <button type='submit' class='btn btn-success' >Continuar</button>
			      </div>

			     </form>
			   
			    </div>
			</div>";
		}	
	}
	elseif ($p1==2) 
	{
		foreach ($Table as $Row)
    	{
			echo "<div class='container'>
			      <div class='modal-body'>
			    <form class='login' action='SaveCitaAlter.php' method='post'>
			    <div class='form-group'>
			    <h4 text-align: center;>Editar Cita</h4>
			    <input class= 'form-control' type='hidden' name='ID' value='$idci'>
			      </div>
			      <div class='form-group'>
			        <label for='nombre'>Dirección:</label>
			        <input class= 'form-control' type='text' value='".$Row -> Direccion."' name='Direccion'>
			      </div>
			      <div class='form-group'>
			        <label for='imputAsunto'>Asunto</label>
			        <select class='form-control' name='Asunto'>
				        <option value='".$Row -> Asunto."'>Asunto Actual: ".$Row -> Asunto."</option>
				        <option value='Presupuesto'>Presupuesto</option>
				        <option value='Instalacion'>Instalación</option>
				        <option value='Reparacion'>Reparación</option>
	      			</select> 
			      </div>
			      <div class='row'>
			      <div class='form-group col-md-4 col'>
	      			<label for='Fecha'>Fecha</label>
	      			<input type='date' name='Fecha' value='".$Row -> Fecha."' class='form-control' id='inputhours'>
	   			  </div>
			      <div class='form-group col-md-4 col'>
	      			<label for='Hora'>Hora</label>
	      			<input type='time' value='".$Row -> Hora."' name='Hora' class='form-control' id='inputhours'>
	   			  </div>
			    <div class='form-group col-md-4 col'>
				   <label for='inputCity'>Ciudad</label>
				    <select class='form-control' name='Ciudad'>
				        <option value='".$Row -> Ciudad."'>Ciudad Actual: ".$Row -> Ciudad."</option>
				        <option value='Torreon'>Torreón</option>
				        <option value='Matamoros'>Matamoros</option>
				        <option value='Lerdo'>Lerdo</option>
				        <option value='Gomez Palacio'>Gomez Palacio</option>
	      			</select>
	    		</div>
	    		</div>
			      <div class='modal-footer'>
			        <a href='index.php' class='btn btn-secondary' data-dismiss='modal'>Cerrar</a>
			        <button type='submit' class='btn btn-success' >Continuar</button>
			      </div>

			     </form>
			   
			    </div>
			</div>";
		}
	} 


?>

</body>
</html>