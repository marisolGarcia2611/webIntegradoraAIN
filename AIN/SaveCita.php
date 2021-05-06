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

    <title>guardadrCita</title>
  </head>



<body>

<div class="container">
   
  <?php
    include 'Database.php';

     $DB = new Database();
     $DB ->ConnectDatabase();
     session_start();
        $ID =$_SESSION ["IDPer"];    
     
     

    extract($_POST);
    $Query = "INSERT INTO citas_pendientes(Direccion,Fecha,Hora,Ciudad,Asunto,ClienteID)VALUES('$direccion','$fecha','$hora','$ciudad','$asunto','$ID')";
    $DB->RunSQL($Query);

        echo "<div class='alert alert-success'> ¡Enviado! </div>";
        
        header("refresh:3 index.php");


    ?>

</div>

</body>
</html>