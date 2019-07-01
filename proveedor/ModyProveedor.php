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
 $sql=mysqli_query($link,"SELECT * FROM proveedor WHERE idproveedor='$id'");
 $row=mysqli_fetch_array($sql);
 $nombre=$row["nombre"];
 $direccion=$row["direccion"];
 $telefono=$row["telefono"];
 $correo=$row["correo"];
 $contacto=$row["contacto"];
 $observacion=$row["observacion"];

 }
 else
 {
  $nombre="";
 echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
 }

?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Proveedor</title>
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
            <h1>Modificar Proveedor</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Contactos</li>
              <li>Proveedor</li>
              <li class="active">Modificar Proveedor</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registroProveedores" class="form-horizontal form-label-left">
               <section class="content-header">
                <h1>Datos del Proveedor</h1>
              </section>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Proveedor</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nombre" class="form-control col-md-7 col-xs-12"  name="nombre"  type="text" value="<?php echo $nombre ?>">
                    <span class="fa fa-user-secret form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contacto">Encargado</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="contacto" class="form-control col-md-7 col-xs-12" name="contacto" type="text" value="<?php echo $contacto ?>">
                    <span class="fa fa-user-secret form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="direccion" class="form-control col-md-7 col-xs-12" name="direccion" type="text" value="<?php echo $direccion ?>">
                    <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono ?>">
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                <label for="email" class="control-label col-md-3">Correo Electronico</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" type="email" name="email" class="form-control col-md-7 col-xs-12"  value="<?php echo $correo ?>">
                  <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Observación</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea id="observacion" name="observacion" class="form-control col-md-7 col-xs-12"><?php echo $observacion ?></textarea>
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
    <?php include '../includes/footer.php' ?>
  <?php include '../includes/script.php' ?>
  <script src="../js/frm.reg.proveedores.js"></script>

</body>
</html>
<?php
 if (isset($_POST['submit'])) {
   $nombre=$_POST["nombre"];
   $direccion=$_POST["direccion"];
   $telefono=$_POST["telefono"];
   $id_tipo_proveedor=$_POST["tipo_proveedor"];
   $contacto=$_POST["contacto"];
   $observacion=$_POST["observacion"];

     $update=mysqli_query($link, "UPDATE proveedor SET nombre='$nombre',direccion='$direccion',telefono='$telefono',correo='$correo',contacto='$contacto',observacion='$observacion' WHERE idproveedor='$id'");
     if($update)
     {
      echo "<script>
 	   location.replace('../proveedor/ListadoProveedores.php?q=$nombre&info=modificar');
            </script>";

     }
     else
     {
      
      echo "<script>
                 swal(
              'Oops...',
               'Error al actualizar el registro!',
               'error'
             )</script>";     }

  }
  ?>
