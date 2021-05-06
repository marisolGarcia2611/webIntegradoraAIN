<!DOCTYPE html>
<html lang="es">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/Recurso.css">
     <link rel="icon"  type="image/png" href="../imagenes/AIN-Imagnes/AIN-platino.png">
       <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="/css/font.css">
     <link rel="stylesheet" href="../css/main.css">
     <link rel="stylesheet" href="../css/font.css">
    <script src="../js/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js" ></script>

    <title>DeleteUsers</title>
  </head>

<body style="background-image: url('../imagenes/AIN-Imagnes/AIN-des4.jpg');">
<?php
    include 'Database.php';
    $connection = new Database();
    $connection -> ConnectDatabase();
    session_start();
    if (isset($_SESSION["User"])) 
    {
      echo " <nav class='navbar navbar-dark bg-dark text-center' ><div class='' ><img src='../imagenes/AIN-Imagnes/AIN-platino.png' width='110' height='70' class='d-inline-block d-none'></div>
            
              <div class='social-bar' style='right:0;top: 0%;font-size: 1.5rem;'>

              <div  class='icon icon-user-tie' >   ".$_SESSION["User"]."</div>
              <a href='AIN2.php' class='icon icon-exit'></a>
               
               </div>
               </nav>";
    }
?>

<?php
    
    
    extract($_GET);

if ($action == 1) 
{
  
    $SQL = "SELECT * FROM usuarios INNER JOIN clientes ON clientes.UsuarioID = usuarios.UsuarioID";
    $Table = $connection -> RunSQLUser($SQL);
 
    echo "<table class='table table-hover'>
      <thead class='text-light' style='background-color: rgb(32,178,170.4);'>
        <tr>
          <th scope='col'>Accion</th>
          <th scope='col'>Nombre Usuario</th>
          <th scope='col'>Tipo Usuario</th>
          <th scope='col'>Nombre</th>
          <th scope='col'>Apellido</th>
          <th scope='col'>Telefono</th>
          <th scope='col'>Correo</th>
        </tr>
      </thead>
    <tbody>";

    foreach ($Table as $Row)
    {
       echo "<tr class='text-dark font-weight-bold'style='background-color:rgb(0,0,0,.2);padding:50px;border-radius:10px;' > ";
    
      echo "<td><a href='DeleteUsers.php?id=".$Row -> UsuarioID."&Delete=1' class='btn btn-danger'>Eliminar</a>
      <a href='Edit.php?id=".$Row -> UsuarioID."&Tipe=1' class='btn btn-warning'>Editar</a></td>";
      echo "<td> ".$Row -> NombreUsuario." </td>";
      echo "<td> ".$Row -> TipoUsuario." </td>";
      echo "<td> ".$Row -> Nombre." </td>";
      echo "<td> ".$Row -> Apellidos." </td>";
      echo "<td> ".$Row -> Telefono." </td>";
      echo "<td> ".$Row -> Correo." </td>";
      echo "</tr>";
    }

  echo "</tbody> </table>";
  echo " <wbr><wbr><wbr><a  href='AIN2.php' class='btn btn-link text-dark font-weight-bold'>Volver</a>";
}elseif ($action == 2) 
{
      $SQL = "SELECT * FROM proveedores INNER JOIN material_proveedor on proveedores.ProveedorID=material_proveedor.ProveedorID INNER JOIN materiales on materiales.MaterialID=material_proveedor.MaterialID";
    $Table = $connection -> RunSQLUser($SQL);
 
    echo "<div class='' style='border-radius:10px;'><table class='table table-hover'>
      <thead class='text-light' style='background-color: rgb(32,178,170.4);'>
        <tr>
          <th scope='col'>Accion</th>
          <th scope='col'>Nombres Proveedores</th>
          <th scope='col'>Correos</th>
          <th scope='col'>Telefonos</th>
          <th scope='col'>Direcciones</th>
          <th scope='col'>Nombre Materiales</th>
        </tr>
      </thead>
    <tbody>
    <wbr>
    <wbr>
    <wbr>
    <a href='NewProvee.php?p=1' class='btn btn-primary'>Agregar Proveedores</a>";


    foreach ($Table as $Row)
    {
      echo "<tr class='text-dark font-weight-bold'style='background-color:rgb(0,0,0,.2);padding:50px;border-radius:10px;' > ";
      echo "<td>
      <a href='DeleteUsers.php?idProve=".$Row -> ProveedorID."&idMate=".$Row -> MaterialID."&Delete=2' class='btn btn-danger'>Eliminar</a></td>";
      echo "<td> ".$Row -> NombreEmpresa." </td>";
      echo "<td> ".$Row -> Correo." </td>";
      echo "<td> ".$Row -> Telefono." </td>";
      echo "<td> ".$Row -> Direccion." </td>";
      echo "<td> ".$Row ->  Nombre." </td>";
      echo "</tr> ";
    }
      echo "</tbody> </table></div>";
      echo "<wbr><wbr><wbr><a href='AIN2.php' class='btn text-dark  font-weight-bold btn-link'>Volver</a>";  
  }elseif ($action == 3) 
  {
    $SQL = "SELECT * FROM usuarios INNER JOIN empleados ON empleados.UsuarioID = usuarios.UsuarioID";
    $Table = $connection -> RunSQLUser($SQL);
 
    echo "<table class='table table-hover'>
       <thead class='text-light' style='background-color: rgb(32,178,170.4);'>
        <tr>
          <th scope='col'>Accion</th>
          <th scope='col'>Nombre Usuario</th>
          <th scope='col'>Tipo Usuario</th>
          <th scope='col'>Nombre</th>
          <th scope='col'>Apellido</th>
          <th scope='col'>Telefono</th>
          <th scope='col'>Correo</th>
        </tr>
      </thead>
    <tbody>";

    foreach ($Table as $Row)
    {
       echo "<tr class='text-dark font-weight-bold'style='background-color:rgb(0,0,0,.2);padding:50px;border-radius:10px;' > ";
      echo "<td><a href='DeleteUsers.php?id=".$Row -> UsuarioID."&Delete=3' class='btn btn-danger'>Eliminar</a>
      <a href='Edit.php?id=".$Row -> UsuarioID."&Tipe=2' class='btn btn-warning'>Editar</a></td>";
      echo "<td> ".$Row -> NombreUsuario." </td>";
      echo "<td> ".$Row -> TipoUsuario." </td>";
      echo "<td> ".$Row -> Nombre." </td>";
      echo "<td> ".$Row -> Apellidos." </td>";
      echo "<td> ".$Row -> Telefono." </td>";
      echo "<td> ".$Row -> Correo." </td>";
      echo "</tr>";
    }
    echo "</tbody> </table>";
      echo "<wbr><wbr><wbr><a href='AIN2.php' class='btn btn-link text-dark  font-weight-bold'>Volver</a>"; 
  }

  $connection->DisconnectDatabase();

  ?>
</body>
</html>