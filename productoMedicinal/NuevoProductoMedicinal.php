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
  <title> | Clinica Veterinaria | Registrar Producto Medicinal</title>
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
            <h1>Nuevo Producto Medicinal</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Producto Medicinal</li>
              <li class="active">Nuevo Producto Medicinal</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_NuevoProductoMedicinal" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos del Producto Medicinal</h1>
              </section>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigoproducto">Codigo Interno del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="codigointerno" name="codigointerno" class="form-control col-md-7 col-xs-12" type="text">
                    <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nombre" name="nombre" class="form-control col-md-7 col-xs-12" type="text">
                    <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <a href="#">
                  <button type="button" class="btn btn-light" style="width: 220px; ">
                    <i class="fa fa-plus"> Agregar nuevo producto</i>
                  </button>
                </a>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Descripción del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cantidad" class="form-control col-md-7 col-xs-12" name="cantidad"  type="text">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_categoria">Categoria del Producto</label>

                    <?php
    									include ('conectar.php');
                      $consulta_categoria= mysqli_query($link, "SELECT * FROM categoria");
    									echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
    									echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"categoria\" name=\"categoria\" >";
                      while ($fila= mysqli_fetch_array($consulta_categoria)) {
    										echo "<option value='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
    									}
                      echo "  </select>";
    									echo "	</div>";
                    ?>

                    <a href="#">
                  <button type="button" class="btn btn-light" style="width: 220px; ">
                    <i class="fa fa-plus"> Agregar nueva categoria</i>
                  </button>
                </a>

              </div>

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_proveedor">Proveedor</label>

                    <?php
    									include ('conectar.php');
                      $consulta_proveedor= mysqli_query($link, "SELECT * FROM proveedor");
    									echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
    									echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"proveedor\" name=\"proveedor\" >";
                      while ($fila= mysqli_fetch_array($consulta_proveedor)) {
    										echo "<option value='".$fila['idproveedor']."'>".$fila['nombre']."</option>";
    									}
                      echo "  </select>";
    									echo "	</div>";
                    ?>

                    <a href="#">
                  <button type="button" class="btn btn-light" style="width: 220px; ">
                    <i class="fa fa-plus"> Agregar nuevo proveedor</i>
                  </button>
                </a>

              </div>

                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Presentacion</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="presentacion" class="form-control col-md-7 col-xs-12" name="presentacion" type="text"> 
                    <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Valor</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="valor" class="form-control col-md-7 col-xs-12" name="valor" type="text">
                    
                    <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Vencimiento</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker2'>
                      <input type='text' class="form-control" id="fechaVencimiento" name="fechaVencimiento"/>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                  </div>
                </div>


              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stock">Precio de Compra</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="precioCompra" class="form-control col-md-7 col-xs-12"  name="precioCompra" type="text">
                    <span class="fa fa-paper-plane-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stock">Precio de Venta</label>
                  <div class="col-md-6 col-sm-6 col-xs-12-">
                    <input id="precioVenta" class="form-control col-md-7 c"];="ol-xs-12" name="precioVenta"  required="required" type="text">
                    <span class="fa fa-paper-plane-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
              </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">-
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
  <?php include '../includes/script.php' ?>
  <script type="text/javascript" src="../js/frm.reg.productoMedicinal.js"></script>
  

  </script>

</body>
</html>
<?php
 if (isset($_POST['submit'])) {
     $codigoInterno=$_POST["codigointerno"];
     $nombre=$_POST["nombre"];
     $descripcion=$_POST["descripcion"];
     $cantidad=$_POST["cantidad"];
     $categoria=$_POST["categoria"];
     $proveedor=$_POST["proveedor"];
     $presentacion=$_POST["presentacion"];
     $valor=$_POST["valor"];
     $fechaVencimiento=$_POST["fechaVencimiento"];
     $precioVenta=$_POST["precioVenta"];
     $precioCompra=$_POST["precioCompra"];



     $sql_comprueba_producto="SELECT * FROM productos where nombre='$nombre' or cod_interno= '$codigoInterno'";
     $ejecuta_sql_producto=mysqli_query($link,$sql_comprueba_producto);
     $comprueba_producto=mysqli_num_rows($ejecuta_sql_producto);
     if ($comprueba_producto==0) {

      $insertar1=mysqli_query($link,"INSERT INTO productos (idproducto,cod_interno,nombre,descripcion,idcategoria,cantidad) values('','$codigoInterno','$nombre','$descripcion','$categoria','$cantidad')");
     
     $insertar2=mysqli_query($link,"INSERT INTO stock_movimiento (idStock_movimiento,idproducto,idproveedor,cantidad) values('',LAST_INSERT_ID(),'$proveedor','$cantidad')");


    $insertar3=mysqli_query($link,"INSERT INTO detalle_producto (iddetalle_producto,idStock_movimiento,presentacion,valor,precio_compra,precio_venta,fecha_vencimiento) values('',LAST_INSERT_ID(),'$presentacion','$valor','$precioCompra','$precioVenta','$fechaVencimiento')");

      

       if ($insertar1) {

          //echo "<script>alert('insertar1');</script>";

          if ($insertar2) {
            //echo "<script>alert('insertar2');</script>";
         
          if ($insertar3) {
             echo "<script>
                location.replace('../productoMedicinal/ListadoProductoMedicinal.php');
               </script>";
          }
           
            }
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
               'El Producto Medicinal ya existe!',
               'error'
               )</script>";

         mysqli_close($link);
     }
 }
 ?>
