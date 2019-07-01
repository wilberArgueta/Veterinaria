<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php
if($_GET)
{
 include("../conectar.php");
 $id=$_GET["id"];
 $sql=mysqli_query($link,"SELECT *FROM usuario WHERE idusuario='$id'");
 $row=mysqli_fetch_array($sql);
 $nombre_usuario=$row["nombreUsuario"];
 $nombre=$row["nombre"];
 $apellido=$row["apellido"];
 $telefono=$row["telefono"];
 $direccion=$row["direccion"];
 $clave=$row["clave"];
 $correo=$row["correo"];

 }
 else
 {
  $nombre_usuario="";
  $nombre="";
 echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
 }

?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Usuario</title>

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
            <h1>Modificar Usuario</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Usuario</li>
              <li class="active">Modificar Usuario</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            <form  method="post" role="form" id="frm_registrousuario" class="form-horizontal form-label-left">
            <span class="section">Datos del Usuario</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombreusuario"> Usuario</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombreUsuario" class="form-control col-md-7 col-xs-12" name="nombreUsuario" type="text" value="<?php echo $nombre_usuario?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombreCompleto" class="form-control col-md-7 col-xs-12"  name="nombreCompleto" type="text" value="<?php echo $nombre?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="apellidoCompleto" class="form-control col-md-7 col-xs-12" name="apellido" type="text" value="<?php echo $apellido?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="telefono" name="telefono" class="form-control" data-inputmask="'mask' : '9999-9999'" value="<?php echo $telefono?>">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="direccion" class="form-control col-md-7 col-xs-12"  name="direccion" type="text" value="<?php echo $direccion?>">
                  <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>


              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Contraseña</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password_usuario" type="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $clave?>" >
                  <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Confirmar Contraseña</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password_confirmara_usuario" type="password" name="password2"  class="form-control col-md-7 col-xs-12" value="<?php echo $clave?>">
                  <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo Electronico</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $correo; ?>" >
                  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                     <input class="btn btn-md btn-primary" id="submit" type="submit" name="submit" value="Registrar">
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
  <script src="../js/frm.reg.usuario.js"></script>

</body>
</html>

<?php
 if (isset($_POST['submit'])) {
     $nombreUsuario=$_POST["nombreUsuario"];
     $nombre=$_POST["nombreCompleto"];
     $apellido=$_POST["apellido"];
     $telefono=$_POST["telefono"];
     $direccion=$_POST["direccion"];
     $clave=MD5($_POST["password"]);
     $correo=$_POST["email"];

     $update=mysqli_query($link, "UPDATE usuario SET nombreUsuario='$nombreUsuario',nombre='$nombre',apellido='$apellido',telefono='$telefono',direccion='$direccion',clave='$clave',correo='$correo' WHERE idUsuario='$id'");
     if($update)
     {
      echo "<script>
     location.replace('../usuario/ListadoUsuarios.php?q=$nombre&info=modificar');
            </script>";


     }
     else
     {
       
        echo "<script>
                 swal(
              'Oops...',
               'Error al actualizar el registro!',
               'error'
             )</script>"; 
     }

  }
  ?>
