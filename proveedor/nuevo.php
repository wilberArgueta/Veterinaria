<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
include '../conectar.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title> | Clinica Veterinaria | Registrar Proveedor</title>
  <?php include '../includes/head.php'?>
</head>

<body class="nav-md">
  <?php
include '../includes/nav.php';
include '../includes/cerrarSesion.php'
?>

  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nuevo Proveedor</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Contactos</li>
              <li>Proveedor</li>
              <li class="active">Nuevo Proveedor</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id="frm_registroProveedores" class="form-horizontal form-label-left">
              <section class="content-header">
                <h1>Datos del Proveedor</h1>
              </section>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Proveedor</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                  <span class="fa fa-user-secret form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contacto">Encargado</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="contacto" class="form-control col-md-7 col-xs-12" name="contacto" type="text">
                  <span class="fa fa-user-secret form-control-feedback right" aria-hidden="true"></span>
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
                  <input type="tel" id="telefono" name="telefono" class="form-control"
                    data-inputmask="'mask' : '9999-9999'" required="required">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label for="email" class="control-label col-md-3">Correo Electronico</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" type="email" name="email" class="form-control col-md-7 col-xs-12">
                  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion">Observación</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="observacion" name="observacion" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Cancelar</button>
                  <button id="registrar" type="submit" name="submit" class="btn btn-primary">Registrar</button>
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
  <script src="../js/frm.reg.proveedores.js"></script>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $contacto = $_POST["contacto"];
    $correo = $_POST["email"];
    $observacion = $_POST["observacion"];

    $sql_comprueba_proveedor = "SELECT nombre FROM proveedor where nombre='$nombre'";
    $ejecuta_sql_proveedor = mysqli_query($link, $sql_comprueba_proveedor);
    $comprueba_proveedor = mysqli_num_rows($ejecuta_sql_proveedor);
    try {
        if ($comprueba_proveedor == 0) {
            $query = "INSERT INTO proveedor (nombre,direccion,telefono,correo,contacto,observacion)
        values('$nombre','$direccion','$telefono','$correo','$contacto','$observacion')";
            $insertar = mysqli_query($link, $query);
            if ($insertar) {
                echo "<script>
               location.replace('../proveedor/index.php?q=$nombre&info=add');
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