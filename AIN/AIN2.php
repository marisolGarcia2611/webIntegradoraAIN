<!DOCTYPE html>
<html lang="es">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/Recurso.css">
     <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="/css/font.css">
     <link rel="stylesheet" href="../css/main.css">
     <link rel="stylesheet" href="../css/font.css">
     <link rel="icon"  type="image/png" href="../imagenes/AIN-Imagnes/AIN-platino.png">
       <script src="../js/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="../js/bootstrap.js" ></script>
     <script src="../js/scripts.js"></script>

    <title>AIN-trabajador</title>
  </head>


//empleado que tiene menos ordenes
<body style="background-image: url('../imagenes/AIN-Imagnes/AIN-des4.jpg');">
<?php
    session_start();
    if (isset($_SESSION["User"])) 
    {
      switch ($_SESSION["TipeUser"]) 
      {
        case 'Empleado':
        echo " <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
          <div class='social-bar' style='right:0;top: 0%;font-size: 1.5rem;'>

              <div  class='icon icon-user-tie'>   ".$_SESSION["User"]."</div>
              <a href='CloseSession.php' class='icon icon-exit'></a>
               
               </div>
          </nav>
          <ul class='nav nav-tabs bg-info ' id='myTab' role='tablist'  >
  
          <li class='av-item'>
            <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
          </li>
            <li class='nav-item active'>
                <a class='nav-link font-weight-bold  let' href='Citas.php?fechaI=0001-01-01&fechaF=0001-01-02'>Citas<span class='sr-only'></span></a>
              </li>";
            /*<li class='nav-item'>
              <a class='nav-link font-weight-bold let' id='contact-tab' data-toggle='tab' href='#contact' role='tab' aria-controls='contact' aria-selected='false'>Pedidos</a>
            </li>*/
          echo "<li class='nav-item dropdown'>
            <a class='nav-link font-weight-bold let' id='contact-tab dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Avanzado</a>
            <div class='dropdown-menu'>
              <a class='dropdown-item' href='ShowUsers.php?action=1'>Ver Usuarios</a>
              <a class='dropdown-item' href='NewEmployee.php'data-toggle='modal' data-target='#MymodalAltaU' aling='right'>Agregar Usuario</a>
            </div>
          </li>
        </ul>";
          break;
        case 'Dueno':
            echo " <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
            
              <div class='social-bar' style='right:0;top: 0%;font-size: 1.5rem;'>

              <div  class='icon icon-user-tie'>   ".$_SESSION["User"]."</div>
              <a href='CloseSession.php' class='icon icon-exit'></a>
               
               </div>

            </nav>

            <ul class='nav nav-tabs bg-info ' id='myTab' role='tablist'  >
  
            <li class='av-item'>
              <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
            </li>
            <li class='nav-item active'>
                <a class='nav-link font-weight-bold  let' href='Citas.php?fechaI=0001-01-01&fechaF=0001-01-02'>Citas<span class='sr-only'></span></a>
              </li>";
            /*<li class='nav-item'>
              <a class='nav-link font-weight-bold let' id='contact-tab' data-toggle='tab' href='#contact' role='tab' aria-controls='contact' aria-selected='false'>Pedidos</a>
            </li>*/
           echo"<li class='nav-item dropdown'>
            <a class='nav-link font-weight-bold let' id='contact-tab dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Avanzado</a>
            <div class='dropdown-menu'>
              <a class='dropdown-item' href='ShowUsers.php?action=3'>Ver Empleado</a>
              <a class='dropdown-item' href='ShowUsers.php?action=1'>Ver Usuarios</a>
              <a class='dropdown-item' href='ShowUsers.php?action=2'>Ver Proveedores</a>
              <div class='dropdown-divider'></div>
              <a class='dropdown-item' href='NewEmployee.php'data-toggle='modal' data-target='#MymodalAltaU' aling='right'>Agregar Usuario</a>              
            </div>
          </li>
          </ul>";
          break;
        case 'Cliente':
              echo " <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
                <div class='container'>
                 </div>
                </nav>
                <ul class='nav nav-tabs bg-info ' id='myTab' role='tablist'  >
                <li class='av-item'>
                  <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
                </li>
                </ul>";
          break;
        default:
          break;
      } 
    }
    else
    {
      echo " <nav class='navbar navbar-light bg-light text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
      <div class='container'>
       </div>
      </nav>
      <ul class='nav nav-tabs bg-info ' id='myTab' role='tablist'  >
      <li class='av-item'>
        <a class='nav-link active font-weight-bold  let' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>Inicio</a>
      </li>
      </ul>";
      header("Refresh:3 index.php");
    }
?>
<!-- Pestañas Navs -->
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
 	<div class="container row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  
   
<?php
    include 'Database.php';
    $connection = new Database();
    $connection->ConnectDatabase();
    $query = "SELECT Nombre, Descripcion, ProductoID FROM productos ORDER BY productos.ProductoID";
    $Catalogue = $connection -> ReturnCatalogue($query);
    $i=0;
    foreach ($Catalogue as $Card)
    {
      echo " <div class='card h-150 col-xs-3 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-light' left: 70px
    right: 70px style='max-width:319px;margin-left:70px;margin-bottom:30px;background-color:rgb(105,105,105);'>
        <img src='../imagenes/AIN-Imagnes/".$Card -> ProductoID.".png' class='card-img-top' alt='Card image' width='200' height='200' />
        <div style='height:300px;'class='card-block'>
          <h4 class='card-title text-center' style='margin-top:5px;'>". $Card -> Nombre ."</h4>
          <p class='card-text text-left'>". $Card -> Descripcion ."</p>
      </div>";
      if (isset($_SESSION["User"])) 
      {
        if ($_SESSION["TipeUser"]=="Empleado" or $_SESSION["TipeUser"]=="Dueno") 
        { 
         echo "<a href='Delete.php?id=".$Card->ProductoID."' style='position: absolute;bottom: 5px;right: 10px;margin-top:50px;' class='btn btn-danger'><img style='width: 22px;height: 30px;' src='/bootstrap-4.5.0-dist/imagenes/AIN-Imagnes/basura.png'></a>";
        }
      }
       echo "</div>";
      }
    if (isset($_SESSION["User"])) 
    {
      if ($_SESSION["TipeUser"]=="Empleado" or $_SESSION["TipeUser"]=="Dueno") 
      {  
        echo " <div class='card h-150 col-xs-3 col-sm-8 col-md-3 col-lg-3 col-xl-3' left: 70px;
        right: 70px style='max-width:319px;margin-left:70px;margin-bottom:30px;background-color:rgb(105,105,105);''>
           

            <div class='card-block text-center text-warning'style='padding:30px;'>

              <h2 class='card-title'style='margin-top:40px;margin-bottom:60px;'>Añadir producto al Catálogo</h2>

              <p class='card-text'></p>
              <button type='button'class='btn btn-info'style='border-radius:50%;' data-toggle='modal' data-target='#exampleModalEdit' >
               <h1 style='font-size:120px;'>&nbsp;+&nbsp;</h1>
              </button>
            </div>
          </div><wbr><wbr><wbr>";
      }
    }
    
    $connection->DisconnectDatabase();
?>


</div>
</div>

<!--CARTA PARA AÑADIR-->
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
    <form class="login" action="NewEmployee.php" method="post">
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
        <label for="APaterno">Contraseña:</label>
        <input class= "form-control"type="password" name="Pass2" placeholder="Escribe Contraseña"> 
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Type" id="Cat4" value="Cliente">
        <label class="form-check-label" for="inlineRadio2">Cliente</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Type" id="Cat5" value="Empleado">
        <label class="form-check-label" for="inlineRadio3">Empleado</label>
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




<!-- Modal de edición de Información información -->
<div class="modal fade" id="exampleModalEdit"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo producto</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
  <form action="SaveCataloge.php" method="post" enctype="multipart/form-data">
 
 <h4 class="text-info">Ingrese la información.</h4>

 <wbr>
<div class="row">
      
    <div class="form-group  col">
      <label for="Telefono">Nombre de producto</label>
      <input type="text" name="Name" class="form-control" id="inputhours">
   </div>
  
 </div>
 <wbr>
  <hr>
<h5 class="text-info">Información de Portada</h5>
<wbr>
   <div class="row">
     
    <div class="form-group col-md-6 col">
    <label for="exampleFormControlFile1" >Seleccione una imagen </label>
    <input type="file" name="Image" class="form-control-file" id="exampleFormControlFile1">
  </div>


    <div class="form-group col-md-6 col">
    <label for="exampleFormControlTextarea1">Descripción del producto</label>
    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
 </div>
  <wbr>
  <label for="exampleFormControlTextarea1">Tipo de Producto</label>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Category" id="Cat1" value="Cristales">
  <label class="form-check-label" for="inlineRadio1">Cristales</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Category" id="Cat2" value="Ventanas">
  <label class="form-check-label" for="inlineRadio2">Ventanas</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Category" id="Cat3" value="Decoracion">
  <label class="form-check-label" for="inlineRadio3">Decoracion</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Category" id="Cat4" value="Puertas">
  <label class="form-check-label" for="inlineRadio2">Puertas</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Category" id="Cat5" value="Ventanales">
  <label class="form-check-label" for="inlineRadio3">Ventanales</label>
</div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>   
      </div>
</form>
      </div>   
    </div>
  </div>
</div>
    <!--PIE DE PAGINA-->
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


    <header>
    
  <h1 class="text-light text-center" style="background: purple;-webkit-border-top-right-radius:40px 30px;
  -webkit-border-bottom-right-radius:40px 30px; width:400px ;height:68px; ">Agenda de Citas</h1>

</header>

<wbr>

<div class="row text-center">
<div class="col-md-12 col-12">
<form class="form-inline" method="post"  name="formFechas" id="formFechas">
    <div class="col-xs-10 col-xs-offset-3">
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
        </div>
        <div class="form-group">
            <label for="fecha_final">Fecha Final:</label>
            <input type="date" class="form-control" name="fecha_final" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>
</div>
</div>


  <!-- pestañas de Pedidos -->


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

    <div class="container">
    

 


    </div>
   </div>


    </div> 




 

</body>
</html>
<script type="text/javascript">
 
    $('Formfechas').submit(function(e){

        e.preventDefault();

        var form = $($this);
        var url = form.attr('action');

        $.ajax(
        {
            type: "POST",
            url: 'Buscar.php',
            data: form.serialize(),
            success: function(data)
            {
                $('#tabla_resultado').html('');
                $('#tabla_resultado').append(data); 
            }
        });
    }); 

</script>