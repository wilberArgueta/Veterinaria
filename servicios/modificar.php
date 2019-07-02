<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
?>
<?php
if (isset($_GET)) {
    include "../conectar.php";
    $id = $_GET["id"];
    $sql = mysqli_query($link, "SELECT * FROM servicios WHERE id_servicio='$id'");
    $row = mysqli_fetch_array($sql);
    $tipo_servicio = $row["tipo_servicio"];
    $descripcion = $row["descripcion"];
    $idcliente = $row["idcliente"];
    $precio = $row["precio"];

} else {
    $tipo_servicio = "";
    echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Servicio</title>
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
                       <h1>Modificar Servicio</h1>
                        <ol class="breadcrumb">
                          <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Servicio</li>
                          <li class="active">Modificar Servicio</li>
                        </ol>
                      </section>
                    </div>
                  </div>
                </div>

                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <form method="post" role="form" id= "frm_registroservicio" class="form-horizontal form-label-left" novalidate>
                          <span class="section">Datos del Servicio</span>

                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_servicio">Tipo de Servicio</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="tipo_servicio" required="required" name="tipo_servicio" class="form-control col-md-7 col-xs-12"><?php echo $tipo_servicio ?></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"><?php echo $descripcion ?></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>

                <?php
$consulta_cliente = mysqli_query($link, "SELECT * FROM cliente");
echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"idcliente\" name=\"idcliente\" >";
while ($fila = mysqli_fetch_array($consulta_cliente)) {
    if ($tipo == $fila['idcliente']) {
        echo "<option value='" . $fila['idcliente'] . "' selected>" . $fila['nombre'] . "</option>";
    }
    echo "<option value='" . $fila['idcliente'] . "'>" . $fila['nombre'] . "</option>";
}
echo "  </select>";
echo "  </div>";
?>


              </div>


                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="precio"  required="required" type="text" value="<?php echo $precio ?>">
                                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                              </div>
                             </div>




                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Cancelar</button>
                            <button id="registrar" name="submit" type="submit" class="btn btn-primary">Registrar</button>
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
    <script type="text/javascript" src="../js/frm.reg.servicio.js"></script>
  </body>
</html>
</html>
<?php
if (isset($_POST['submit'])) {
    $tipo_servicio = $_POST["tipo_servicio"];
    $descripcion = $_POST["descripcion"];
    $idcliente = $_POST["idcliente"];
    $precio = $_POST["precio"];

    $update = mysqli_query($link, "UPDATE servicios SET tipo_servicio='$tipo_servicio',descripcion='$descripcion',idcliente='$idcliente',precio='$precio' WHERE id_servicio='$id'");
    if ($update) {
        echo "<script>
     location.replace('../servicios/index.php?q=$tipo_servicio&info=modificar');
            </script>";

    } else {

        echo "<script>
                 swal(
              'Oops...',
               'Error al actualizar el registro!',
               'error'
             )</script>";
    }

}
?>
