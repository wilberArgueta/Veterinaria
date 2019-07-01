<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php include '../conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar de Venta</title>
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
            <h1>Modificar Venta</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Ventas</li>
              <li class="active">Modificar Venta</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registroventa" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos de la Venta</h1>
              </section>

              <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso">Fecha de la consulta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepicker2'>
                                  <input type='date' class="form-control" name="fecha" id="fecha" />
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>
                            </div><br>


                <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Numero</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="numero" name="numero" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div><br>



                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>

                    <?php
                      include ('conectar.php');
                      $consulta_cliente= mysqli_query($link, "SELECT * FROM cliente");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"idcliente\" name=\"idcliente\">";  
                      echo "<option value=''>Seleccione</option>";
                      while ($fila= mysqli_fetch_array($consulta_cliente)) {
                        if ($tipo==$fila['idcliente']) {
                        echo "<option value='".$fila['idcliente']."' selected>".$fila['nombre']."</option>";
                        }
                        echo "<option value='".$fila['idcliente']."'>".$fila['nombre']."</option>";
                      }
                      echo "  </select>";
                      echo "  </div>";
                    ?>

                    <a href="#">
                      <button type="button" class="btn btn-secondary" title="Agregar Cliente">
                        <i class="fa fa-plus"></i>
                      </button> 
                    </a>
                </div><br>
              

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Preoducto</label>
              <?php
                      include ('conectar.php');
                      $consulta_producto= mysqli_query($link, "SELECT * FROM productos ORDER BY idproducto ASC");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control js-example-basic-single  col-md-7 col-xs-12\" id=\"idproducto\" name=\"idproducto\">";  
                      echo "<option value=''>Seleccione</option>";
                      while ($fila= mysqli_fetch_array($consulta_producto)) {
                        if ($tipo==$fila['idproducto']) {
                        echo "<option value='".$fila['ListadoProductoMedicinal.php']."' selected>".$fila['nombre']."</option>";
                        }
                        echo "<option value='".$fila['idproducto']."'>".$fila['nombre']."</option>";
                      }
                      echo "  </select>";
                      echo "  </div>";
                    ?>
            
              </div><br>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Cantidad</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="cantidad" name="cantidad" title="Cantidad" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" >
                </div>
              </div><br>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Precio</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="recio"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div><br>

              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="button" style="width: 150px; margin-left: 600px;" class="btn btn-warning">
                  <b>INGRESAR</b>
                </button> 
                </div>
              </div>
<br>

            <hr>

            <table class="table" style="margin-left: 100px; margin-top: -20px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio unit</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
              </tbody>
            </table><br>
            <br>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="suma">Suma</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="suma" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="suma"  required="required" type="text">
                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
              </div>
            </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descuento">Descuento</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="descuento" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="descuento"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subtotal">Subtotal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="subtotal" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="subtotal"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
        

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iva">0% IVA</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="iva" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="iva"  required="required" type="text">
                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
              </div>
               </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total">Total</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="total" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

           








                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                    <button id="registrar" type="submit" class="btn btn-primary">Registrar</button>
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

</body>
</html>
