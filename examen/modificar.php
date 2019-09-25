<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
if (isset($_GET)) {
    include "../conectar.php";
    $id = $_GET["id"];
    $sql = mysqli_query($link, "SELECT * FROM examen WHERE idexamen='$id'");
    $row = mysqli_fetch_array($sql);

    $tipo_examen = $row["tipo_examen"];
    $descripcion = $row["descripcion"];
    $idlaboratorio = $row["idlaboratorio"];
    $fecha_examen = $row["fecha_examen"];
    $precio = $row["precio"];

} else {
    $nombre = "";
    echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Examen</title>
  <?php include '../includes/head.php'?>
</head>

  <body class="nav-md">
  <?php include '../includes/nav.php'?>

              <div class="right_col" role="main">
                <div class="row">
                  <div class="col-md-12">
                    <div class="x_panel">
                      <section class="content-header">
                        <h1>Modificar Examen</h1>
                        <ol class="breadcrumb">
                          <li><a href="../inicio.php"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Examenes</li>
                          <li class="active">Modificar Examen</li>
                        </ol>
                      </section>
                    </div>
                  </div>
                </div>

                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <form method="post" role="form" id= "frm_registroExamen" class="form-horizontal form-label-left" novalidate>
                          <span class="section">Datos de el Examen</span>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_examen">Tipo de Éxamen</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="tipo_examen" required="required" name="tipo_examen" class="form-control col-md-7 col-xs-12"><?php echo $tipo_examen ?></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"> <?php echo $descripcion ?></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idlaboratorio">Laboratorio</label>

                              <?php
include '../conectar.php';
$consulta_laboratorio = mysqli_query($link, "SELECT * FROM laboratorio");
echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"idlaboratorio\" name=\"idlaboratorio\" >";
while ($fila = mysqli_fetch_array($consulta_laboratorio)) {
    if ($tipo == $fila['idlaboratorio']) {
        echo "<option value='" . $fila['idlaboratorio'] . "' selected>" . $fila['nombre'] . "</option>";
    }
    echo "<option value='" . $fila['idlaboratorio'] . "'>" . $fila['nombre'] . "</option>";
}
echo "  </select>";
echo "  </div>";
?>
                            </div>


                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_examen">Fecha de Examen</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepicker2'>
                                  <input type='date' class="form-control" name="fecha_examen" id="fecha_examen" value="<?php echo $fecha_examen ?>"/>
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>
                           </div>

                             <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="precio"  required="required" type="text" value="<?php echo $precio ?>"/>
                              <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
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
      <?php include '../includes/footer.php'?>
      </div>
    </div>

    <?php include '../includes/script.php'?>
    <script type="text/javascript" src="js/frm.reg.examen.js"></script>
  </body>
</html>
<?php
if (isset($_POST['submit'])) {

    $tipo_examen = $_POST["tipo_examen"];
    $descripcion = $_POST["descripcion"];
    $idlaboratorio = $_POST["idlaboratorio"];
    $fecha_examen = $_POST["fecha_examen"];
    $precio = $_POST["precio"];

    $update = mysqli_query($link, "UPDATE examen SET tipo_examen='$tipo_examen',descripcion='$descripcion',idlaboratorio='$idlaboratorio',fecha_examen='$fecha_examen',precio='$precio' WHERE idexamen='$id'");
    if ($update) {
        echo "<script>
     location.replace('index.php?q=$tipo_examen&info=modificar');
            </script>";

    } else {
        echo "<script>alert('Error al actualizar el registro');</script>";
    }

}
?>
