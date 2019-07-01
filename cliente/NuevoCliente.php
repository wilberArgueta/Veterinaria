<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php include('../conectar.php') ?>
<?php include('../modal/ModalMascota.php');?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Cliente</title>

  <?php include '../includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include '../includes/nav.php' ?>
  <?php include '../includes/cerrarSesion.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nuevo Cliente</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Clientes</li>
              <li>Cliente</li>
              <li class="active">Nuevo Cliente</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            <form  method="post" role="form" id="frm_registrocliente" class="form-horizontal form-label-left">
            <span class="section">Datos del Cliente</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12"  name="nombre" type="text" >
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="apellido" class="form-control col-md-7 col-xs-12" name="apellido" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="direccion" class="form-control col-md-7 col-xs-12"  name="direccion" type="text">
                  <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="telefono" name="telefono" class="form-control">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mascota">Nombre de la mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php
                  $consulta_mascota=mysqli_query($link,"SELECT * FROM mascota ORDER BY idmascota ASC ");

                   echo " <select  class=\"form-control js-example-basic-single\" id=\"mascota\" title=\"Has clic para desplegar\" name=\"mascota\" >";
                   echo "<option value=''>Seleccione..</option>";

                  while($fila=mysqli_fetch_array($consulta_mascota)){
                       echo "<option value='".$fila['idmascota']."'>".$fila['nombre']."</option>";
                   }
                   echo "  </select>";
                   ?>
                </div>

                  <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarMascota"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar mascota </button>
              </div>

             
              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                   <div class="col-md-6 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Cancelar</button>
                      <button id="registrar" type="submit" name="submit" class="btn btn-primary">Registrar</button>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
  
  <?php include '../includes/footer.php' ?>
  <?php include '../includes/script.php' ?>
  <script type="text/javascript" src="../js/frm.reg.cliente.js"></script>
  
</body>
</html>

<?php
 if (isset($_POST['submit'])) {
     $nombre=$_POST["nombre"];
     $apellido=$_POST["apellido"];
     $direccion=$_POST["direccion"];
     $telefono=$_POST["telefono"];
     $mascota=$_POST["mascota"];

     $sql_comprueba_cliente="SELECT nombre FROM cliente where nombre='$nombre' AND mascota= '$mascota'";
     $ejecuta_sql_cliente=mysqli_query($link,$sql_comprueba_cliente);
     $comprueba_cliente=mysqli_num_rows($ejecuta_sql_cliente);
     if ($comprueba_cliente==0) {
         $insertar=mysqli_query($link,"INSERT INTO cliente (idcliente,nombre,apellido,direccion,telefono,idmascota) values('','$nombre','$apellido','$direccion','$telefono','$mascota')");
         if ($insertar) {
             echo "<script>
                   location.replace('ListadoCliente.php?q=$nombre&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El registro ya existe'?');</script>";
         mysqli_close($link);
     }
 }
 ?>
