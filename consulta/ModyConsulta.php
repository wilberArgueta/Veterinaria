<?php
if($_GET)
{
 include("conectar.php");
 $id=$_GET["id"];
 $sql=mysqli_query($link,"SELECT * FROM consulta WHERE idconsulta='$id'");
 $row=mysqli_fetch_array($sql);
 $idcliente=$row["idcliente"];
 $descripcion=$row["descripcion"];
 $c_fisiologica=$row["c_fisiologica"];
 $tratamiento=$row["tratamiento"];
 $fecha_ingreso=$row["fecha_ingreso"];
 $precio=$row["precio"];

 }
 else
 {
  $idcliente="";
 echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
 }

?>


<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Consulta</title>
  <?php include 'includes/head.php' ?>
</head>

  <body class="nav-md">
  <?php include 'includes/nav.php' ?>

              <div class="right_col" role="main">
                <div class="row">
                  <div class="col-md-12">
                    <div class="x_panel">
                      <section class="content-header">
                        <h1>Modificar Consulta</h1>
                        <ol class="breadcrumb">
                          <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
                          <li>Expediente</li>
                          <li>Consultas</li>
                          <li class="active">Modificar Consulta</li>
                        </ol>
                      </section>
                    </div>
                  </div>
                </div>

                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <form method="post" role="form" id= "frm_registroconsulta" class="form-horizontal form-label-left" novalidate>
                          <span class="section">Datos de la Consulta</span>

                            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>

                <?php
                  include ('conectar.php');
                  $consulta_cliente= mysqli_query($link, "SELECT * FROM cliente");
                  echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                  echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"idcliente\" name=\"idcliente\" >";
                  while ($fila= mysqli_fetch_array($consulta_cliente)) {
                    if ($tipo==$fila['idcliente']) {
                    echo "<option value='".$fila['idcliente']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idcliente']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>

              </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"><?php echo $descripcion ?></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_fisiologica">Constancia Fisiologica</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="c_fisiologica"  name="c_fisiologica" class="form-control col-md-7 col-xs-12"><?php echo $c_fisiologica ?></textarea>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tratamiento">Tratamiento</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea id="tratamiento"  name="tratamiento" class="form-control col-md-7 col-xs-12"><?php echo $tratamiento ?></textarea>
                              </div>
                            </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso">Fecha de la consulta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepicker2'>
                                  <input type='date' class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $fecha_ingreso ?>"/>
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>
                            </div>

                            <!-- 
                              <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="porcentajeganancia">Porsentaje Ganancia</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="porcentajeganancia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="porcentajeganancia"  required="required" type="text"  id="inputSuccess5"/>
                                  <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>

                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="examen">Examen</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php
                              /*
                                $consulta_examen=mysqli_query($link,"SELECT * FROM tipo_examen ORDER BY idtipo_examen ASC ");

                                 echo " <select  class=\"form-control\" id=\"examen\" title=\"Has clic para desplegar\" name=\"examen\" >";
                                 echo "<option value=''>Seleccione..</option>";

                                while($fila=mysqli_fetch_array($consulta_examen)){
                                     echo "<option value='".$fila['idtipo_examen']."'>".$fila['nombre']."</option>";
                                 }
                                 echo "  </select>";
                                 */
                              ?>
    
                               
                                </div>
                              
                              <a href="#">
                                  <button type="button" class="btn btn-light" style="width: 220px; ">
                                    <i class="fa fa-plus"> Agregar nuevo examen</i>
                                  </button> 
                                </a>
                            </div>
                             -->
                            

                            

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="precio"  required="required" type="text" value="<?php echo $precio ?>">
                              <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <!-- 
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="producto">Producto</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php
                              /*
                                $consulta_producto=mysqli_query($link,"SELECT * FROM productos ORDER BY idproducto ASC ");

                                 echo " <select  class=\"form-control\" id=\"producto\" title=\"Has clic para desplegar\" name=\"producto\" >";
                                 echo "<option value=''>Seleccione..</option>";

                                while($fila=mysqli_fetch_array($consulta_producto)){
                                     echo "<option value='".$fila['idproducto']."'>".$fila['nombre']."</option>";
                                 }
                                 echo "  </select>";
                                 */
                              ?>
    
                               
                                </div>

                              <a href="#">
                                  <button type="button" class="btn btn-light" style="width: 220px; ">
                                    <i class="fa fa-plus"> Agregar nuevo producto</i>
                                  </button> 
                                </a>

                          </div>
                           -->
                          

                          

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
      <?php include 'includes/footer.php' ?>
      </div>
    </div>

    <?php include 'includes/script.php' ?>
    <script type="text/javascript" src="js/frm.reg.consulta.js"></script>
  </body>
</html>
<?php
 if ($_POST) {
   $idcliente=$_POST["idcliente"];
   $descripcion=$_POST["descripcion"];
   $c_fisiologica=$_POST["c_fisiologica"];
   $tratamiento=$_POST["tratamiento"];
   $fecha_ingreso=$_POST["fecha_ingreso"];
   $precio=$_POST["precio"];

     $update=mysqli_query($link, "UPDATE consulta SET idcliente='$idcliente',descripcion='$descripcion',c_fisiologica='$c_fisiologica',tratamiento='$tratamiento',fecha_ingreso='$fecha_ingreso',precio='$precio' WHERE idconsulta='$id'");
     if($update)
     {
      echo "<script>
     location.replace('ListadoConsultas.php?q=$idcliente&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
