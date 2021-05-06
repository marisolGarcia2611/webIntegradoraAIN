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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>AIN-trabajador</title>
  </head>
<body style="background-image: url('../imagenes/AIN-Imagnes/AIN-des4.jpg');">
  <?php
    session_start();
    if (isset($_SESSION["User"])) 
    {echo " <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
            
              <div class='social-bar' style='right:0;top: 0%;font-size: 1.5rem;'>

              <div  class='icon icon-user-tie' >   ".$_SESSION["User"]."</div>
              <a href='AIN2.php' class='icon icon-exit'></a>
               
               </div>
               </nav>";
        }
        ?>
    <header>
  <h1 class="text-light text-center" style="background: purple;-webkit-border-top-right-radius:40px 30px;
  -webkit-border-bottom-right-radius:40px 30px; width:400px ;height:68px; ">Agenda de Citas</h1>
</header>
<div class="container" style="background-color:rgb(0,0,0,.8);padding-left:160px;padding-top:30px;padding-bottom:30px;border-radius:10px; ">


<form class="form-inline text-center" method="get" name="formFechas" id="formFechas">
    
      <div class="row text-light text-center"> 
        <div class="form-group">
      <div class="col-md-6 col-12">
       
            <label for="fecha_inicio"><h3>Fecha Inicio:</h3></label>
            <input type="date" class="form-control" name="fechaI" required>
         </div>
      <div class="col-md-6 col-12">
        
            <label for="fecha_final"><h3>Fecha Final:</h3></label>
            <input type="date" class="form-control" name="fechaF" required>
        </div> 
        <div class="col-md-12 col-12"></div>
       <br>
        <wbr>
         <div class="col-md-12 col-12">
        <button type="submit" class="btn btn-primary"><img src="../imagenes/fonts/search.svg" width="30px;"height="30px;"></button>
      </div>  </div>

    </div>

       
        
</form>

</div>
<wbr>
<wbr>
<wbr>
</div>
<wbr>
<wbr>
<?php
include 'Database.php';
$conexion= new Database();
$conexion->ConnectDatabase();
extract($_POST);
extract($_GET);
$ID=$_SESSION ["ID"];

$consulta="SELECT * FROM citas_pendientes INNER JOIN clientes ON clientes.ClienteID=citas_pendientes.ClienteID where citas_pendientes.Fecha between '$fechaI' and '$fechaF'";
$tabla=$conexion->seleccionar($consulta);

echo"<table class='table table-hover te'>
      <thead class='text-light' style='background-color: rgb(32,178,170.4);'>
      <tr>
      
      <th>Dirección</th>
      <th>Cliente</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Ciudad</th>
      <th>Asunto</th>
      <th>Eliminar</th>

      </tr>
      </thead>
      <tbody>";
      foreach($tabla as $fila)
      {
        echo "<tr class='text-dark font-weight-bold'style='background-color:rgb(0,0,0,.2);padding:50px;border-radius:10px;' > ";
    
        echo "<td> $fila->Direccion</td>";

        echo "<td> $fila->Nombre</td>";
        echo "<td> $fila->Correo</td>";
        echo "<td> $fila->Telefono</td>";
        echo "<td> $fila->Fecha</td>";
        echo "<td> $fila->Hora</td>";
        echo "<td> $fila->Ciudad</td>";
        echo "<td> $fila->Asunto</td>";
        echo "<td>
                <a href='deleteCitas.php?idci=".$fila -> CitasID."&idcli=".$fila -> ClienteID."&Delete=1' class='btn btn-danger'>ok</a>
            </td>";
        
        echo "</tr>";
      }
      echo "</tbody></table";
      $conexion->DisconnectDatabase();
        ?>



</body>
</html>