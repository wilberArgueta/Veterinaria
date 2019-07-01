<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php include '../conectar.php' ?>
<?php include('../modal/Modalcliente.php');?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Servicio</title>
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
                       <h1>Nuevo Servicio</h1>
                        <ol class="breadcrumb">
                          <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Servicio</li>
                          <li class="active">Nuevo Servicio</li>
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
                                <textarea id="tipo_servicio" required="required" name="tipo_servicio" class="form-control col-md-7 col-xs-12"></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $consulta_mascota=mysqli_query($link,"SELECT * FROM cliente ORDER BY idcliente ASC ");

                                 echo " <select  class=\"form-control js-example-basic-single\" id=\"idcliente\" title=\"Has clic para desplegar\" name=\"idcliente\" >";
                                 echo "<option value=''>Seleccione..</option>";

                                while($fila=mysqli_fetch_array($consulta_mascota)){
                                     echo "<option value='".$fila['idcliente']."'>".$fila['nombre']."</option>";
                                 }
                                 echo "  </select>";
                                 ?>
                              </div>
                              <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarCliente"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar cliente </button>

                            </div>

                          

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="precio"  required="required" type="text">
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
      <?php include '../includes/footer.php' ?>
    <?php include '../includes/script.php' ?>
    <script type="text/javascript" src="../js/frm.reg.servicio.js"></script>
  </body>
</html>

<?php 
if (isset($_POST['submit'])) {
  $tipo_servicio=$_POST["tipo_servicio"];
  $descripcion=$_POST["descripcion"];
  $idcliente=$_POST["idcliente"];
  $precio=$_POST["precio"];

  $sql_comprueba_servicio="SELECT tipo_servicio FROM servicios where tipo_servicio='$tipo_servicio'";
  $ejecuta_sql_servicio=mysqli_query($link,$sql_comprueba_servicio);
  $comprueba_servicio=mysqli_num_rows($ejecuta_sql_servicio);
  if ($comprueba_servicio==0) {
    $insertar=mysqli_query($link, "INSERT INTO servicios(id_servicio,tipo_servicio,descripcion,idcliente,precio) values ('','$tipo_servicio','$descripcion','$idcliente','$precio')");
    if ($insertar) {
      echo "<script>
        location.replace('../servicios/ListadoServicios.php?q=$tipo_servicio&info=add');
      </script>";
    }
    else {
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
}
 ?>



