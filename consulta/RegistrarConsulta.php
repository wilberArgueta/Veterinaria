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
  <title> | Clinica Veterinaria | Registrar Consulta</title>
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
                        <h1>Nueva Consulta</h1>
                        <ol class="breadcrumb">
                          <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Consultas</li>
                          <li class="active">Nueva Consulta</li>
                        </ol>
                      </section>
                    </div>
                  </div>
                </div>

                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <form method="post" role="form" id="frm_registroconsulta" class="form-horizontal form-label-left" novalidate>
                          <span class="section">Datos de la Consulta</span>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php
                                $consulta_cliente=mysqli_query($link,"SELECT * FROM cliente ORDER BY idcliente ASC ");

                                 echo " <select  class=\"form-control js-example-basic-single\" id=\"idcliente\" title=\"Has clic para desplegar\" name=\"idcliente\" >";
                                 echo "<option value=''>Seleccione..</option>";

                                while($fila=mysqli_fetch_array($consulta_cliente)){
                                     echo "<option value='".$fila['idcliente']."'>".$fila['nombre'].$fila['apellido']."</option>";
                                 }
                                 echo "  </select>";
                              ?>
    
                               
                                </div>

                                <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarCliente"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar cliente </button>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_fisiologica">Constancia Fisiologica</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="c_fisiologica"  name="c_fisiologica" class="form-control col-md-7 col-xs-12"></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tratamiento">Tratamiento</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="tratamiento"  name="tratamiento" class="form-control col-md-7 col-xs-12"></textarea>
                              </div>
                            </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso">Fecha de la consulta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' >
                                  <input type='date' class="form-control" name="fecha_ingreso" id="fecha_ingreso" />
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
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Cancelar</button>
                              <input class="btn btn-md btn-primary" id="submit" type="submit" name="submit" value="Registrar">
                            </div>
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
    <script type="text/javascript" src="../js/frm.reg.consulta.js"></script>
  </body>
</html>

<?php
 if (isset($_POST['submit'])) {
     $idcliente=$_POST["idcliente"];
     $descripcion=$_POST["descripcion"];
     $c_fisiologica=$_POST["c_fisiologica"];
     $tratamiento=$_POST["tratamiento"];
      $fecha_ingreso=$_POST["fecha_ingreso"];
     $precio=$_POST["precio"];

     $sql_comprueba_consulta="SELECT idcliente FROM consulta where idcliente='$idcliente'";
     $ejecuta_sql_consulta=mysqli_query($link,$sql_comprueba_consulta);
     $comprueba_consulta=mysqli_num_rows($ejecuta_sql_consulta);
     if ($comprueba_consulta==0) {
         $insertar=mysqli_query($link,"INSERT INTO consulta (idconsulta,idcliente,descripcion,c_fisiologica,tratamiento,fecha_ingreso,precio) values('','$idcliente','$descripcion','$c_fisiologica','$tratamiento','$fecha_ingreso','$precio')");
         if ($insertar) {
             echo "<script>
               location.replace('ListadoConsultas.php?q=$idcliente&info=add');
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




