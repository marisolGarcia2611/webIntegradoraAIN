<!DOCTYPE html>
<html lang="es">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/Recurso.css">
     <link rel="icon"  type="image/png" href="../imagenes/AIN-Imagnes/AIN-platino.png">
    <script src="../js/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js" ></script>

    <title>AIN</title>
  </head>



<body>
    

<header>
  <h5>Citas</h5>
</header>

      <div>
<?php
include 'Database.php';
$conexion= new Database();
$conexion->ConnectDatabase();
 session_start();
     $ID =$_SESSION ["ID"];

$consulta="SELECT * FROM citas_pendientes ";
$tabla=$conexion->seleccionar($consulta);

echo"<table class='table table-hover'>
      <thead class='thead-warning'>
      <tr>
      <th>Dirección</th>

      <th>Cliente</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Ciudad</th>
      <th>Asunto</th>
      </tr>
      </thead>
      <tbody>";
      foreach($tabla as $fila)
      {
        echo "<tr>";
        echo "<td> $fila->Direccion</td>";
       
        echo "<td> $fila->ClienteID</td>";
        echo "<td> $fila->Fecha</td>";
        echo "<td> $fila->Hora</td>";
        echo "<td> $fila->Ciudad</td>";
        echo "<td> $fila->Asunto</td>";
        
        
        echo "</tr>";
      }
      echo "</tbody></table";
      $conexion->DisconnectDatabase();

        ?>
</div>
</body>
</html>