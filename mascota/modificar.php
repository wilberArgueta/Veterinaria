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
    $sql = mysqli_query($link, "SELECT *FROM mascota WHERE idmascota='$id'");
    $row = mysqli_fetch_array($sql);
    $expediente = $row["expediente"];
    $nombre_mascota = $row["nombre"];
    $raza = $row["raza"];
    $edad = $row["edad"];
    $peso = $row["peso"];
    $talla = $row["talla"];
    $genero = $row["genero"];

} else {
    $nombre_mascota = "";
    echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> | Clinica Veterinaria | Modificar Mascota</title>

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
            <h1>Modificar Mascota</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Mascota</li>
              <li class="active">Modificar Mascota</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            <form  method="post" role="form" id="frm_nuevaMascota" class="form-horizontal form-label-left">
            <span class="section">Datos de la mascota</span>

             <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Expediente de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="expedienteMascota" class="form-control col-md-7 col-xs-12"   name="expedienteMascota" type="text" value="<?php echo $expediente ?>">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombremascota" class="form-control col-md-7 col-xs-12"  name="nombremascota" type="text" value="<?php echo $nombre_mascota ?>">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="raza">Raza de la mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="raza" class="form-control col-md-7 col-xs-12" name="raza" type="text" value="<?php echo $raza ?>">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Edad de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="edadMascota" class="form-control col-md-7 col-xs-12"  name="edadMascota" type="text" value="<?php echo $edad ?>" >
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Peso de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="peso" class="form-control col-md-7 col-xs-12"  name="peso" type="text" value="<?php echo $peso ?>">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="altura">Talla de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="talla" class="form-control col-md-7 col-xs-12"  name="talla" type="text" value="<?php echo $talla ?>">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>



              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero">Genero de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="genero" class="form-control col-md-7 col-xs-12"  name="genero" type="text" readonly="readonly" value="<?php echo $genero ?>">
                  <span class=" fa fa-mars-double form-control-feedback right" aria-hidden="true"></span>
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
  <?php include '../includes/script.php'?>
  <script type="text/javascript" src="../js/frm.reg.mascota.js"></script>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $expediente = $_POST["expedienteMascota"];
    $nombremascota = $_POST["nombremascota"];
    $raza = $_POST["raza"];
    $edad = $_POST["edadMascota"];
    $peso = $_POST["peso"];
    $talla = $_POST["talla"];
    $genero = $_POST["genero"];

    $update = mysqli_query($link, "UPDATE mascota SET expediente= '$expediente',nombre='$nombremascota',raza='$raza',edad='$edad',peso='$peso',talla='$talla',genero='$genero' WHERE idmascota='$id'");
    if ($update) {
        echo "<script>
     location.replace('../mascota/index.php?q=$nombremascota&info=modificar');
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
