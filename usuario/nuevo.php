<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
?>
<?php include '../conectar.php'?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Usuario</title>

  <?php include '../includes/head.php'?>

</head>
<body class="nav-md">
  <?php include '../includes/nav.php'?>
  <?php include '../includes/cerrarSesion.php'?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nuevo Usuario</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Usuario</li>
              <li class="active">Nuevo Usuario</li>
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
                  <input id="nombreUsuario" class="form-control col-md-7 col-xs-12" name="nombreUsuario" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombreCompleto" class="form-control col-md-7 col-xs-12"  name="nombreCompleto" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="apellidoCompleto" class="form-control col-md-7 col-xs-12" name="apellidoCompleto" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="telefono" name="telefono" class="form-control" data-inputmask="'mask' : '9999-9999'">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
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
                <label for="password" class="control-label col-md-3">Contraseña</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12">
                  <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Confirmar Contraseña</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password_confirmara_usuario" type="password" name="password_confirmara_usuario"  class="form-control col-md-7 col-xs-12" >
                  <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label for="email" class="control-label col-md-3">Correo Electronico</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" type="email" name="email" class="form-control col-md-7 col-xs-12" >
                  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
        

              <div class="ln_solid" onloadedmetadata=""></div>
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
    <?php include '../includes/footer.php'?>
  <?php include '../includes/script.php'?>
  <script src="../js/frm.reg.usuario.js"></script>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nombreUsuario = $_POST["nombreUsuario"];
    $nombre = $_POST["nombreCompleto"];
    $apellido = $_POST["apellidoCompleto"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $clave = MD5($_POST["password"]);
    $correo = $_POST["email"];

    try {
        $sql_comprueba_user = "SELECT nombre_usuario FROM usuario where nombre_usuario='$nombreUsuario'";
        $ejecuta_sql_user = mysqli_query($link, $sql_comprueba_user);
        $comprueba_user = mysqli_num_rows($ejecuta_sql_user);
        if ($comprueba_user == 0) {
            $query = "INSERT INTO usuario (nombreUsuario,nombre,apellido,telefono,direccion,clave,correo)
       values('$nombreUsuario','$nombre','$apellido','$telefono','$direccion','$clave','$correo')";
            $insertar = mysqli_query($link, $query);
            if ($insertar) {
                echo "<script>
                   location.replace('index.php?q=$nombreUsuario&info=add');
              </script>";
            } else {
                echo "<script>
                 swal(
              'Oops...',
               'Error al insertar!',
               'error'
             )</script>";
            }
        } else {
            echo "<script>
           swal(
               'Oops...',
               'El registro ya existe!',
               'error'
               )</script>";
            mysqli_close($link);
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}
?>
