<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title> Panel Administrador | Veterinaria Univo</title>
   <?php include '../includes/head.php' ?>
   <?php include '../includes/fullcalendar.php'; ?>
  </head>

 

  <body class="nav-md">
    <?php include '../includes/nav.php' ?>
    <?php include '../includes/cerrarSesion.php' ?>
    <?php include '../includes/main.php' ?>
    <?php include '../includes/footer.php' ?>
    
    <?php include '../includes/script.php' ?>
   <?php include '../includes/calendarscript.php'; ?>
   
  </body>
</html>


