<?php include 'conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Laboratorio</title>
  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <?php include 'includes/cerrarSesion.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nuevo Laboratorio</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Contactos</li>
              <li>Laboratorio</li>
              <li class="active">Nuevo Laboratorio</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registrolaboratorio" class="form-horizontal form-label-left" novalidate>
              <section class="content-header">
                <h1>Datos del Laboratorio</h1>
              </section>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Laboratorio</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                  <span class="fa fa-hospital-o form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="direccion" class="form-control col-md-7 col-xs-12" name="direccion" type="text">
                  <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="telefono" name="telefono" minlength="8" class="form-control" >
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo Eléctronico</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" name="email"class="form-control col-md-7 col-xs-12" type="email">
                  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción del Laboratorio</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Cancelar</button>
                  <button id="registrar" type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include 'includes/footer.php' ?>
  <?php include 'includes/script.php' ?>
<script type="text/javascript" src="js/frm.reg.laboratorio.js"></script>

</body>
</html>
<?php
 if ($_POST) {
     $nombre=$_POST["nombre"];
     $direccion=$_POST["direccion"];
     $telefono=$_POST["telefono"];
     $correo=$_POST["email"];
     $descripcion=$_POST["descripcion"];

     $sql_comprueba_laboratorio="SELECT nombre FROM laboratorio where nombre='$nombre'";
     $ejecuta_sql_laboratorio=mysqli_query($link,$sql_comprueba_laboratorio);
     $comprueba_laaboratorio=mysqli_num_rows($ejecuta_sql_laboratorio);
     if ($comprueba_laaboratorio==0) {
         $insertar=mysqli_query($link,"INSERT INTO laboratorio (idlaboratorio,nombre,direccion,telefono,correo,descripcion) values('','$nombre','$direccion','$telefono','$correo','$descripcion')");
         if ($insertar) {
             echo "<script>
               location.replace('ListadoLaboratorio.php?q=$nombre&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El laboratorio ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>
