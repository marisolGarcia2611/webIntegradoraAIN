<!DOCTYPE html>
<html lang="es">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/Recurso.css">
     <link rel="icon"  type="image/png" href="../imagenes/AIN-Imagnes/AIN-platino.png">
      <link rel="stylesheet" href="../css/font.css">
     <link rel="stylesheet" href="../css/main.css">
     <link rel="stylesheet" href="../css/font.css">
    <script src="../js/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js" ></script>

    <title>AIN</title>
  </head>



<body style="background-image: url('../imagenes/AIN-Imagnes/AIN-des4.jpg');">
<!-- Conexion Base de datos -->
<?php
  include 'Database.php';
  $connection = new Database();
  $connection->ConnectDatabase(); 
?>
<?php
    session_start();
    if (isset($_SESSION["User"])) 
    {
     echo "   <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
      <div class='social-bar' style='right:0;top: 0%;font-size: 1.5rem;'>

              <div  class='icon icon-users' style='background: rgb(60,179,113,.6);'>   ".$_SESSION["User"]."</div>
              <a href='CloseSession.php' class='icon icon-exit'></a>
               
               </div>
      </nav>";
    }
    else
    {
       echo "   <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
      <button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#Mymodal1'>Iniciar sesión</button>";
    }
?>

     <!-- Modal de logeo para iniciar como trabajador -->


  	<div class="modal" tabindex="-1" id="Mymodal1" tabindex="-1" role="dialog" aria-label="Mymodal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	
      	<br><img  class="usuario" width="60" height="60" src="../imagenes/AIN-Imagnes/pe.png">
        <h5 class="modal-title text-center marg text-dark" id="exampleModalLabel">Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <br>
        </button>
      </div>
      <div class="modal-body">
  	<form class="login" action="VerifyLogin.php" method="post">
  		<div class="form-group">
  			<label for="nombre">Usuario:</label>
  			<input class= "form-control"type="text" name="User" placeholder="Escribe tu Nombre">
  		</div>
  		<div class="form-group">
  			<label for="APaterno">Contraseña:</label>
  			<input class= "form-control"type="password" name="Password" placeholder="Escribe Contraseña">	
  		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-warning" data-toggle="modal" data-target="#MymodalAltaU">Registrar</button>
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Continuar</button>

      </div>

     </form>
      	

     
    </div>
  </div> 	
</div>
</div>


    <div class="modal" tabindex="-1" id="MymodalAltaU" tabindex="-1" role="dialog" aria-label="MymodalAltaU" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <br><img  class="usuario" width="60" height="60" src="../imagenes/AIN-Imagnes/pe.png">
        <h5 class="modal-title text-center marg text-dark" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <br>
        </button>
      </div>
      <div class="modal-body">
    <form class="login" action="SaveUser.php" method="post">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input class= "form-control"type="text" name="Name" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label for="APaterno">Apellidos:</label>
        <input class= "form-control"type="text" name="LastName" placeholder="Apellidos"> 
      </div>
      <div class="form-group">
        <label for="nombre">Telefono:</label>
        <input class= "form-control"type="text" name="Phone" placeholder="Telefono">
      </div>
      <div class="form-group">
        <label for="APaterno">Correo Electronico:</label>
        <input class= "form-control"type="text" name="Email" placeholder="Correo"> 
      </div>
      <div class="form-group">
        <label for="nombre">Usuario:</label>
        <input class= "form-control"type="text" name="User" placeholder="Escribe tu Usuario">
      </div>
      <div class="form-group">
        <label for="APaterno">Contraseña:</label>
        <input class= "form-control"type="password" name="Pass" placeholder="Escribe Contraseña"> 
      </div>
      <div class="form-group">
        <label for="APaterno">Confirma Contraseña:</label>
        <input class= "form-control"type="password" name="Pass2" placeholder="Escribe Contraseña"> 
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" >Continuar</button>
      </div>

     </form>
        

     
    </div>
  </div>  
</div>
</div>



      
     

     </nav>

<!-- Pestañas Navs -->
<?php
    if (isset($_SESSION["User"])) 
    {
      echo "<ul class='nav nav-tabs bg-info '' id='myTab' role='tablis'  >
            <li class='nav-item'>
              <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link font-weight-bold  let' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='false'>Agendar Citas</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link font-weight-bold  let' id='profile-tab' data-toggle='tab' href='#Citas' role='tab' aria-controls='profile' aria-selected='false'>Ver mis Citas</a>
            </li>
            </ul>";
            /*<li class='nav-item'>
              <a class='nav-link font-weight-bold let' id='contact-tab' data-toggle='tab' href='#contact' role='tab' aria-controls='contact' aria-selected='false'>Pedidos</a>
            </li>*/
          
    }
    else
    {
       echo "<ul class='nav nav-tabs bg-info '' id='myTab' role='tablis'  >
  
  
            <li class='nav-item'>
              <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
            </li>
          </ul>";
    }
?>


<!-- Contenido de las pestañas -->

<div class="tab-content" id="myTabContent">


	<!-- Pestaña de Inicio -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
     

     <!-- Carrusel-->
    
     <div class="d-none d-sm-block">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 imag" src="../imagenes/AIN-Imagnes/AIN-blanco.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imag" src="../imagenes/AIN-Imagnes/ventas.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imag" src="../imagenes/AIN-Imagnes/alum.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<!-- Cuerpo del Catalogo -->

 <div class="container" style="background-color:rgb(0,0,0,.8); ">

 	<!-- Cartas de los objetos -->
 	<div class="row">
<?php
    $query = "SELECT Nombre, Descripcion, ProductoID FROM productos ORDER BY productos.ProductoID";
    $Catalogue = $connection -> ReturnCatalogue($query);
    $i=0;
    foreach ($Catalogue as $Card) 
    {
   echo " <div class='card h-150 col-xs-3 col-sm-8 col-md-3 col-lg-3 col-xl-3 text-light' left: 70px;
    right: 70px style='max-width:319px;margin-left:70px;margin-bottom:30px;background-color:rgb(105,105,105);'>
        <img src='../imagenes/AIN-Imagnes/".$Card -> ProductoID.".png' class='card-img-top' alt='Card image' width='200' height='200' />

        <div style='height:250px;' class='card-block'>
          <h4 class='card-title text-center' style='margin-top:5px;'>". $Card -> Nombre ."</h4>
          <p class='card-text'>". $Card -> Descripcion ."</p>
        </div>
      </div>";
       $i++;
        if($i==3){
          echo "<br>
          </p>";
        }
      }

?>
</div>
</div>


<!-- pie de pagina para contacto -->
  <div class=" bg-dark pa" >
   <div class="bg-info" style="width:1370px;height:15px;margin-left: -80px;margin-top: -25px;" ></div>
    <div class="row" style=" padding-top: 35px;">
        <div class="col-xs-12 col-md-6">
            <h6 class="text-muted lead">CONTACTO:</h6>
            <h6 class="text-muted" style="font-size:20px">
            Av. Presidente Carranza 2970 Ote.<br>
            Torreón, Coahuila.<br>
            Teléfonos: 720-70-45 – 8712399362.<br>
            </h6>
        </div>
        <div class="col-xs-12 col-md-6">
        <div class="pull-right">
        <h6 class="text-muted lead">ENCUENTRANOS EN LAS REDES</h6>
              <div style="font-size:20px">
                  <a href="https://api.whatsapp.com/send?phone=528712399362"><p class="text-muted"><img class="usuario" src="../imagenes/AIN-Imagnes/wha.png"><b>8712399362</b></p></a>
                  <a href="https://www.facebook.com/aluminiointegraldelnazas"><p class="text-muted"><img class="usuario" src="../imagenes/AIN-Imagnes/facebook.png"><b>Aluminio Integral del Nazas.</b></p></a>
                  <a href="mailto:aluminioain@hotmail.com"><p class="text-muted"><img class="usuario" src="../imagenes/AIN-Imagnes/sobre.png"><b>aluminioain@hotmail.com</b></p></a>
              </div>
        </div>
        
    </div>
  </div>  
</div>
</div>


 

 

   <!-- Pestañas de Citas -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
 

 <wbr>
<div class="container text-light" style="background-color:rgb(0,0,0,.8);border-radius: 10px; ">
 <wbr>
 <h1 class="text-warning">¡Comienze a Agendar su Cita!</h1>
 <h5>Si desea tener un pedido mejor elborado solicite una cita para que lo asista personal capacitado.</h5>
 <wbr>



<!-- Formulario de citas -->

  <form action="../AIN/SaveCita.php" method="post">

    <wbr>
  <div class="row ">
     <div class="col-md-12 col">
    <label for="inputAddress">Dirección</label>
    <input type="text" name="direccion" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  </div>
 

   <div class="row">
    
      <div class="form-group col-md-4 col">
      <label for="Fecha">Fecha</label>
      <input type="date" name="fecha" class="form-control" id="inputhours">
   </div>

   <div class="form-group col-md-4 col">
      <label for="Hora">Hora</label>
      <input type="time" name="hora" class="form-control" id="inputhours">
   </div>

   <div class="form-group col-md-4 col">
      <label for="inputCity">Ciudad</label>
      <select class="form-control" name="ciudad">
        <option></option>
        <option value="Torreon">Torreón</option>
        <option value="Matamoros">Matamoros</option>
        <option value="Lerdo">Lerdo</option>
        <option value="Gomez Palacio">Gomez Palacio</option>

      </select>
    </div>
  </div>

  <div class="row">
    
   
    <div class="form-group col-md-4 col">
    <label for="imputAsunto">Asunto</label>
    <select class="form-control" name="asunto">
        <option></option>
        <option value="Presupuesto">Presupuesto</option>
        <option value="Instalacion">Instalación</option>
        <option value="Reparacion">Reparación</option>
        
      </select>
  </div>
  </div>
   
     <!-- si se selecciona el encasillado check arrojará la alerta siguiente -->
  
  <div class="alert alert-warning  " role="alert">
   ¡Despues de enviar espere la confirmación de su cita según los medios que a proporcionado!
 </div>
 <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Esta seguro
      </label>
    </div>
  </div>
   <button type="reset" class="btn btn-secondary">Cancelar</button> <button type="submit" class="btn btn-primary">Enviar</button> 


</form>


<!--FIN de Formulario de citas -->


  

</div>
</div>
<div class="tab-pane fade" id="Citas" role="tabpanel" aria-labelledby="profile-tab">
<div class="row text-center">
<div class="col-md-12 col-12">

<?php
$conexion= new Database();
$conexion->ConnectDatabase();
     $ID =$_SESSION ["IDPer"];

$consulta="SELECT * FROM citas_pendientes INNER JOIN clientes ON clientes.ClienteID=citas_pendientes.ClienteID WHERE citas_pendientes.ClienteID=$ID";
$tabla=$conexion->seleccionar($consulta);

echo"<table class='table table-hover'>
      <thead class='text-light' style='background-color: rgb(32,178,170.4);'>
      <tr>
      
      <th>Dirección</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Ciudad</th>
      <th>Asunto</th>
      <th>Acciones</th>

      </tr>
      </thead>
      <tbody>";
      foreach($tabla as $fila)
      {
        echo "<tr class='text-dark font-weight-bold'style='background-color:rgb(0,0,0,.2);padding:50px;border-radius:10px;' > ";
    
    
        echo "<td> $fila->Direccion</td>";

        echo "<td> $fila->Fecha</td>";
        echo "<td> $fila->Hora</td>";
        echo "<td> $fila->Ciudad</td>";
        echo "<td> $fila->Asunto</td>";
        echo "<td>
                <a href='deleteCitas.php?idci=".$fila -> CitasID."&idcli=".$fila -> ClienteID."&Delete=1' class='btn btn-danger'>Eliminar</a>
                <a href='Edit.php?idci=".$fila -> CitasID."&Tipe=3' class='btn btn-warning'>Editar</a>
            </td>";
        
        echo "</tr>";
      }
      echo "</tbody></table";
      $conexion->DisconnectDatabase();
        ?>


</div>
</div>
</div>


  <!-- pestañas de Pedidos -->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  	<div class="container">

 <div class="row">

 <div class="col-md-8 d-none d-sm-block text-center">
<img  class="personas" src="../imagenes/AIN-Imagnes/perso.png">
</div>

 <div class="col-md-4 col-12">
	<p><h1 class="text-success">¡Comienza con tu Pedido! </h1>
<wbr>

	 <!-- Boton para el modal de logeo -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Mymodal">Comenzar</button></p>
</div>
</div>


  <!-- Para cuando ya te hayas logeado se inicia un formulario que permite introducir pedido -->

 <wbr>
 <div class="container border">
 <wbr>
 <h2 class="text-warning">Datos-Pedido</h2>
 <h5>Apartir de este momento inicie con los detalles de su pedido.</h5>
 <wbr>

<!-- Formulario de pedidos -->

  <form>
 <h4 class="text-info">Datos de contacto Actuales.</h4>
 <h6>Se necesita información actual para una localización exitosa.</h6>

 <wbr>
<div class="row">
    	
  	<div class="form-group col-md-6 col">
      <label for="Telefono">Telefono Celular</label>
      <input type="number" class="form-control" id="inputhours">
   </div>
    <div class="form-group col-md-6 col">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>  
 </div>


  	<wbr>
  <div class="row ">

     <div class="form-group col-md-12 col">
      <label for="inputState">Tipo de trabajo</label>
      <select id="inputState" class="form-control">
        <option selected></option>
        <option >Ventana corrediza</option>
        <option >Ventana</option>
        <option >Puertas</option>
        <option >Aparadores</option>
        <option >Canceles de baño</option>
        <option ></option> 
      </select>
      </div>
 </div>
  <wbr>

  <h4 class="text-info">Diseño de trabajo</h4>
 <h6>Aplique la idea de un diseño personalizado estableciendo los datos mencionados.</h6>
 <wbr>	

 <div class="row">
     
    <div class="form-group col-md-6 col">
    <label for="exampleFormControlFile1">Seleccione archivo</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>


 	  <div class="form-group col-md-6 col">
    <label for="exampleFormControlTextarea1">Descripción del trabajo deseado</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 </div>
 

  
   
 <wbr>

  <h4 class="text-info">Relación de entrega</h4>
 <h6>Estime el dia, hora y lugar que se daría la entega del pedido.</h6>
 <wbr>

   <div class="row">
    
      <div class="form-group col-md-4 col">
      <label for="Hora">Dia</label>
      <input type="date" class="form-control" id="inputhours">
   </div>

   <div class="form-group col-md-4 col">
      <label for="Hora">Hora</label>
      <input type="time" class="form-control" id="inputhours">
   </div>

   <div class="form-group col-md-4 col">
    <label for="inputAddress">Dirección</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ciudad</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado</label>
      <select id="inputState" class="form-control">
        <option selected>Cohauila</option>
      </select>
    </div>
   
   
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Esta seguro
      </label>
    </div>
  </div>
   
  <!-- si se selecciona el encasillado check arrojará la alerta siguiente -->
  <div class="alert alert-warning  " role="alert">
   ¡Según el Telefono celular y Email proporcionado mediante alguno de estos conductos se confirmará el pedido y la cita para acordar medidas asertadas!
 </div>

 <wbr>

   <div>
   <button type="reset" class="btn btn-secondary">Cancelar</button> <button type="submit" class="btn btn-primary">Enviar</button> 
   </div>

</form>

</div>
</div>



<!-- Fin del formulario de pedidos -->







</div>
         <!-- modal de logeo -->

  	<div class="modal" tabindex="-1" id="Mymodal" tabindex="-1" role="dialog" aria-label="Mymodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	
      	<br><img  class="usuario" width="60" height="60" src="../imagenes/AIN-Imagnes/pe.png">
        <h5 class="modal-title text-center marg text-dark"  id="exampleModalLabel">Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <br>
        </button>
      </div>
      <div class="modal-body">

      	<h5>Para poder realizar un pedido escribe tu usario y contaseña.</h5>
      	<hr>
  	<form>
  		<div class="form-group">
  			<label for="nombre">Usuario:</label>
  			<input class= "form-control"type="text" name="Nombre" placeholder="Escribe tu Nombre">
  		</div>
  		<div class="form-group">
  			<label for="APaterno">Contraseña:</label>
  			<input class= "form-control"type="password" name="Contraseña" placeholder="Escribe Contraseña">	
  		</div>
  		
     </form>

       <!-- Aviso para darse de alta como cliente -->

     <div class="alert alert-warning  " role="alert">

       <p>Puede que aun no sea un cliente registrado, si es así solo crea un cuenta.</p>
       <button type="button" class="btn btn-info " data-toggle="modal" data-target="#Mymodal2"> crear cuenta </button> 

    </div>
      	
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" type="submit" class="btn btn-success">Continuar</button>
      </div>
     
    </div>
  </div> 	
</div>
</div>

                         <!-- Modal para nuevo cliente-->

<div class="modal" tabindex="-1" id="Mymodal2" tabindex="-1" role="dialog" aria-label="Mymodal2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	
      	<br><img  class="usuario" width="60" height="60" src="../imagenes/AIN-Imagnes/pe.png">
        <h5 class="modal-title text-center marg text-dark" id="exampleModalLabel">Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <br>
        </button>
      </div>
      <div class="modal-body">

      	 <!-- inicio de formulario-->
 <!--Trate de hacer un scroll-->
 <!-- <div data-spy="scroll"  data-offset="0">-->
  	<form>
        
    <div class="row ">
    <div class="col">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" placeholder="Introduce el Nombre(s)">
    </div>
    <div class="col">
       <label for="inputEmail4">Apellido</label>
      <input type="text" class="form-control" placeholder="Introduce Apellido">
    </div>
  </div>
  <wbr>
  <div class="row">

  	<div class="form-group col-md-4 col">
      <label for="Telefono">Telefono Celular</label>
      <input type="number" class="form-control" id="inputhours">
   </div>
    <div class="form-group col-md-6 col">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>  
 </div>
   

   <div class="row">
    
   <div class="form-group col-md-6">
      <label for="Hora">Fecha de Nacimiento</label>
      <input type="date" class="form-control" id="inputhours">
   </div>


   <div class="form-group col-md-4">
    <label for="inputAddress">Edad</label>
    <input type="number" class="form-control" id="inputAddress" >
  </div>
  </div>

  <div class="form-row">
  	<div class="form-group col">
      <label for="inputCity">Situación Fiscal</label>
      <select id="sf" class="form-control">
      	<option></option>
      	<option>Moral</option>
      	<option>Fisica</option>
      </select>
    </div>

    <div class="form-group col">
      <label for="inputCity">Ciudad</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col">
      <label for="inputState">Estado</label>
      <select id="inputState" class="form-control">
        <option selected>Cohauila</option>
      </select>
    </div>


         </div>
  		<div class="form-group">
  			<label for="nombre">Nombre de Usuario:</label>
  			<input class= "form-control"type="text" name="Nombre" placeholder="Escribe tu Nombre">
  		</div>
  		<div class="form-group">
  			<label for="APaterno">Contraseña:</label>
  			<input class= "form-control"type="password" name="Contraseña" placeholder="Escribe Contraseña">	
  		</div>
  		<div class="form-group">
  			<label for="APaterno">Confirmar contraseña:</label>
  			<input class= "form-control"type="password" name="Contraseña" placeholder="Escribe Contraseña">	
  		</div>
  		
     </form>

     <!--</div>-->

     <div class="alert alert-warning  " role="alert">
       Una vez ya hecho el perfil de usuario podrá comenzar con su pedido.
    </div>
      	
      <div class="modal-footer">
         <button type="button" type="reset" class="btn btn-secondary" data-dismiss="modal">Cacelar</button>
        <button type="button" type="submit" class="btn btn-success">Registrar</button>
      </div>
     
    </div>
  </div> 	
</div>
</div>


  		


  	</div>



  </div>

 </div>

</body>
</html>