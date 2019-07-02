<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
if (isset($_GET)) {
    include "../conectar.php";
    $id = $_GET["id"];
    $sql = mysqli_query($link, "SELECT * FROM cliente WHERE idcliente='$id'");

    $row = mysqli_fetch_array($sql);
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $direccion = $row["direccion"];
    $telefono = $row["telefono"];
    $mascota = $row["idmascota"];

} else {
    $nombre = "";
    echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Cliente</title>

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
            <h1>Modificar Cliente</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Clientes</li>
              <li>Cliente</li>
              <li class="active">Modificar Cliente</li>
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
                  <input id="nombre" class="form-control col-md-7 col-xs-12"  name="nombre" type="text" value="<?php echo $nombre ?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Completo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="apellido" class="form-control col-md-7 col-xs-12" name="apellido" type="text" value="<?php echo $apellido ?>">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="direccion" class="form-control col-md-7 col-xs-12"  name="direccion" type="text" value="<?php echo $direccion ?>">
                  <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono ?>">
                  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mascota">Nombre de la mascota</label>

                <?php
include '../conectar.php';
$consulta_tipo_equipo = mysqli_query($link, "SELECT * FROM mascota");
echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"mascota\" name=\"mascota\" >";
while ($fila = mysqli_fetch_array($consulta_tipo_equipo)) {
    if ($tipo == $fila['idmascota']) {
        echo "<option value='" . $fila['idmascota'] . "' selected>" . $fila['nombre'] . "</option>";
    }
    echo "<option value='" . $fila['idmascota'] . "'>" . $fila['nombre'] . "</option>";
}
echo "  </select>";
echo "  </div>";
?>

              </div>


              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                     <input class="btn btn-md btn-primary" id="submit" type="submit" name="submit" value="Guardar">
                  </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
    <?php include '../includes/footer.php'?>
  <?php include '../includes/script.php'?>
  <script type="text/javascript" src="../js/frm.reg.cliente.js"></script>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $mascota = $_POST["mascota"];

    $update = mysqli_query($link, "UPDATE cliente SET nombre='$nombre',apellido='$apellido',direccion='$direccion',telefono= $telefono,idmascota='$mascota' WHERE idcliente='$id'");

    if ($update) {
        echo "<script>
     location.replace('index.php?q=$nombre&info=modificar');
            </script>";

    } else {
        echo "<script>alert('Error al actualizar el registro');</script>";
    }

}
?>