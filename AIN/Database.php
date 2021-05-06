<?php 
class Database
{

	private $PDOlocal;
	private $User = "admin";
	private $Password = "Adm1n1strador.";
	private $Host = "mysql:host=127.0.0.1; dbname=integral_del_nazas";

	function ConnectDatabase ()
	{
		try
		{
			$this->PDOlocal= new PDO($this->Host, $this->User, $this->Password);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	
	}

	function DisconnectDatabase ()
	{
		try
		{
			$this->PDOlocal = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	function verifyLogin($User,$Password)
	{
		try 
		{
			$pass=0;
			$query="SELECT * FROM usuarios WHERE NombreUsuario ='$User'";
			$consulta=$this->PDOlocal->query($query);
			$result = $this->PDOlocal ->query($query);
			while ($registers=$consulta->fetch(PDO::FETCH_ASSOC))//Fetch Retorna valores true o false 
			{
				if (password_verify($Password, $registers['Contrasena'])) 
				{
					$pass=1;
					$Renglon=$result-> fetch(PDO::FETCH_NUM); 
					session_start();
					$_SESSION["User"]=$User;
					$_SESSION["ID"]= $Renglon[2];
					$_SESSION["TipeUser"]= $Renglon[3];
					$ID=$_SESSION["ID"];
				}
			}
			if ($pass>0) 
			{

				
				if ($_SESSION["TipeUser"]=="Empleado" OR $_SESSION["TipeUser"]=="Dueno") 
				{
					echo "<div class='Alert alert-success'>";
					echo "<h2 aling='center'>Bienvenid@ ".$_SESSION["User"]."</h2>";
					echo "</div>";
					$query="SELECT * FROM empleados WHERE empleados.UsuarioID = $ID";
					$resulta = $this->PDOlocal ->query($query);
					$Renglon3 = $resulta -> fetch(PDO::FETCH_NUM);
					$_SESSION["IDPer"]=$Renglon3[0];
					header("refresh:3; AIN2.php");
				}else 
				{
					$_SESSION["User"]=$User;
					echo "<div class='Alert alert-success'>";
					echo "<h2 aling='center'>Bienvenid@ ".$_SESSION["User"]."</h2>";
					echo "</div>";
					$query="SELECT * FROM clientes WHERE clientes.UsuarioID = '$ID'";
					$result2 = $this->PDOlocal ->query($query);
					$Renglon2= $result2 -> fetch(PDO::FETCH_NUM);
					$_SESSION["IDPer"]=$Renglon2[0];
					header("refresh:3; index.php");
				}
				
			}
			else
			{
				echo "<div class='Alert alert-danger'>";
				echo "<h2 aling='center'>Usuario o Password Incorrecto..</h2>";
				echo "</div>";
				header("refresh:3; index.php");
			}
		} 
		catch (PDOException $e) 
		{
			echo $e-> getMessage();
		}
	
	}

	function CloseSession()
	{
		session_start();
		session_destroy();
		echo "<div class='Alert alert-success'>";
		echo "<h2 aling='center'>Hasta Luego</h2>";
		echo "</div>";
		header("location:index.php");
	}
	function RunSQL($SQL)
	{
		try 
		{
			$this->PDOlocal->query($SQL);
		} 
		catch (PDOException $e) 
		{
			echo $e-> getMessage();
		}

		return $this->PDOlocal->lastInsertId();
	}

	function RunSQLDelete($SQL)
	{
		try
		{
			$this->PDOlocal ->query($SQL);

		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	function RunSQLUser($cadenaSQL)
	{
		try
		{
			$resultado = $this->PDOlocal ->query($cadenaSQL);
			$renglon = $resultado-> fetchALL(PDO::FETCH_OBJ); //crea arreglos llamando sus columnas con el nombe de la tabla consultada y recuperada

			return $renglon;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	function ReturnCatalogue($SQL)
	{
		try
		{
			$result = $this->PDOlocal ->query($SQL);
			$renglon = $result-> fetchALL(PDO::FETCH_OBJ); //crea arreglos llamando sus columnas con el nombe de la tabla consultada y recuperada

			return $renglon;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}

	}


	function ejecutarSQL($SQL)
	{
		try
		{
		 $this->PDOlocal->query($SQL);
			
		} 

		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	function seleccionar($cadenaSQL)
	{
		try 
		{
			$resultado=$this->PDOlocal->query($cadenaSQL);
			$renglon=$resultado->fetchALL(PDO::FETCH_OBJ);
			
			return$renglon;
			
		} catch (PDOException $e) 
		{
			echo $e->getMessage();			
		}
	}



}

?>