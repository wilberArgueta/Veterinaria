<?php
$host="localhost";
$user="pruebas";
$pass="123";
$db="veterinaria";

$link=mysqli_connect($host,$user,$pass,$db);
mysqli_query($link,"SET NAMES 'utf8'");
if ($link==false) {
  # code...
  echo "error de conexion con MariaDB".mysqli_connect_error();
  exit;
}
 ?>
