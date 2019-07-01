<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php include '../conectar.php' ?>
<?php include('../modal/ModalLaboratorio.php');?>
<!DOCTYPE html>
<html>
<head>
	<title> | Clinica Veterinaria | Registrar Examen</title>
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
                        <h1>Nuevo Examen</h1>
                        <ol class="breadcrumb">
                          <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Examenes</li>
                          <li class="active">Nuevo Examen</li>
                        </ol>
                      </section>
                    </div>
                  </div>
                </div>

                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <form method="post" role="form" id="frm_registroExamen" class="form-horizontal form-label-left" novalidate>
                          <span class="section">Datos de el Examen</span>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_examen">Tipo de Éxamen</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="tipo_examen" required="required" name="tipo_examen" class="form-control col-md-7 col-xs-12"></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>

                              </div>
                            </div>

                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idlaboratorio">Laboratorio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php
                              $consulta_laboratorio=mysqli_query($link,"SELECT * FROM laboratorio");

                               echo " <select  class=\"form-control js-example-basic-single\" id=\"idlaboratorio\" title=\"Has clic para desplegar\" name=\"idlaboratorio\" >";
                               echo "<option value=''>Seleccione..</option>";

                              while($fila=mysqli_fetch_array($consulta_laboratorio)){
                                   echo "<option value='".$fila['idlaboratorio']."'>".$fila['nombre']."</option>";
                               }
                               echo "  </select>";
                               ?>
                            </div>

                           <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarLaboratorio"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar laboratorio </button>
                          </div>

                          
														<div class="item form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_examen">Fecha de Examen</label>
															<div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepicker2'>
                                  <input type='date' class="form-control" name="fecha_examen" id="fecha_examen" />
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>
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
      </div>
    </div>

    <?php include '../includes/script.php' ?>
    <script type="text/javascript" src="../js/frm.reg.examen.js"></script>
  </body>
</html>

<?php
 if (isset($_POST['submit'])) {
     $tipo_examen=$_POST["tipo_examen"];
     $descripcion=$_POST["descripcion"];
     $idlaboratorio=$_POST["idlaboratorio"];
     $fecha_examen=$_POST["fecha_examen"];
     $precio=$_POST["precio"];
     
     

     $sql_comprueba_examen="SELECT tipo_examen FROM examen where tipo_examen='$tipo_examen'";
     $ejecuta_sql_examen=mysqli_query($link,$sql_comprueba_examen);
     $comprueba_examen=mysqli_num_rows($ejecuta_sql_examen);
     if ($comprueba_examen==0) {
         $insertar=mysqli_query($link,"INSERT INTO examen (   idexamen,tipo_examen,descripcion,idlaboratorio,fecha_examen,precio) values('','$tipo_examen','$descripcion','$idlaboratorio','$fecha_examen','$precio')");
         if ($insertar) {
             echo "<script>
                   location.replace('../examen/ListadoExamenes.php?q=$tipo_examen&info=add');
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
 }
 ?>