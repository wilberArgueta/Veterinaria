<?php
if($_GET)
{
 include("conectar.php");
 $id=$_GET["id"];
 $sql=mysqli_query($link,"SELECT p.id_producto as id_producto, p.codigo_interno as codigo_interno, p.nombre as nombreP, p.descripcion as descripcion, p.unidades_disponible as unidades_disponible, p.porcentaje_ganancia as porcentaje_ganancia, c.nombre AS Categoria, pv.nombre as Proveedor,
 dt.id_detalle_producto as id_detalle_producto, dt.fecha_vencimiento as fecha_vencimiento, dt.precio_venta as precio_venta, dt.precio_compra as precio_compra
 FROM productos  as p INNER JOIN categoria as c ON(p.id_categoria=c.id_categoria) INNER JOIN proveedor as pv
 ON(p.id_proveedor=pv.id_proveedor) INNER JOIN detalle_producto as dt ON(p.id_producto = dt.id_producto)
 WHERE p.id_producto='$id'");

 $row=mysqli_fetch_array($sql);
 $id_detalle_producto=$row["id_detalle_producto"];
 $codigoInterno=$row["codigo_interno"];
 $nombre=$row["nombreP"];
 $descripcion=$row["descripcion"];
 $unidades_disponibles=$row["unidades_disponible"];
 $porcentaje_ganancias=$row["porcentaje_ganancia"];
 $id_categoria=$row["Categoria"];
 $id_proveedor=$row["Proveedor"];
 $fechaVencimiento=$row["fecha_vencimiento"];
 $precioVenta=$row["precio_venta"];
 $precioCompra=$row["precio_compra"];


 }
 else
 {
  $codigoInterno="";
  $nombre="";
 echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
 }

?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Producto Medicinal</title>
  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <?php include 'includes/cerrarSesion.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nuevo Producto Medicinal</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
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

                    <input  name="id_producto" class="form-control col-md-7 col-xs-12"  type="text" value="<?php echo $id ?>">
                    <input  name="id_detalle_producto" class="form-control col-md-7 col-xs-12"  type="text" value="<?php echo $id_detalle_producto ?>">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigoproducto">Codigo Interno del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <input id="codigointerno" name="codigointerno" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $codigoInterno ?>">
                    <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nombre" name="nombre" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $nombre ?>">
                    <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                  </div>

                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Descripción del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="descripcionproducto" name="descripcionproducto" class="form-control col-md-7 col-xs-12"><?php echo "$descripcion"; ?></textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unidadesdisponibles">Unidades disponibles</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="unidadesdisponibles" class="form-control col-md-7 col-xs-12" name="unidadesdisponibles"  type="text" value="<?php echo $unidades_disponibles ?>">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje de Ganancia</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="porcentajeganacia" class="form-control col-md-7 col-xs-12" name="porcentajeganancia" type="text" value="<?php echo $porcentaje_ganancias ?>">
                    <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_categoria">Categoria del Producto</label>

                    <?php
    									include ('conectar.php');
                      $consulta_categoria= mysqli_query($link, "SELECT * FROM categoria");
    									echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
    									echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"categoria\" name=\"categoria\" >";
                      while ($fila= mysqli_fetch_array($consulta_categoria)) {
                        if ($id_categoria==$fila['id_categoria']) {
                        echo "<option value='".$fila['id_categoria']."' selected>".$fila['nombre']."</option>";
                        }
    										echo "<option value='".$fila['id_categoria']."'>".$fila['nombre']."</option>";
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
    									echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"proveedor\" name=\"proveedor\" >";
                      while ($fila= mysqli_fetch_array($consulta_proveedor)) {
                        if ($id_proveedor==$fila['id_proveedor']) {
                        echo "<option value='".$fila['id_proveedor']."' selected>".$fila['nombre']."</option>";
                        }
    										echo "    <option value='".$fila['id_proveedor']."'>".$fila['nombre']."</option>";
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Vencimiento</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker2'>
                      <input type='text' class="form-control" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $fechaVencimiento ?>"/>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                  </div>
                </div>

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stock">Precio de Compra</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="precioCompra" class="form-control col-md-7 col-xs-12"  name="precioCompra" type="text" value="<?php echo $precioCompra ?>">
                    <span class="fa fa-paper-plane-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stock">Precio de Venta</label>
                  <div class="col-md-6 col-sm-6 col-xs-12-">
                    <input id="precioVenta" class="form-control col-md-7 c"];="ol-xs-12" name="precioVenta"  required="required" type="text" value="<?php echo $precioVenta ?>">
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
  <?php include 'includes/footer.php' ?>
  <?php include 'includes/script.php' ?>
  <script type="text/javascript" src="js/frm.reg.productoMedicinal.js">

  </script>

</body>
</html>
<?php
 if ($_POST) {
   $id_producto= $_POST["id_producto"];
   $id_detalle_producto=$_POST["id_detalle_producto"];
   $codigoInterno=$_POST["codigointerno"];
   $nombre=$_POST["nombre"];
   $descripcion=$_POST["descripcionproducto"];
   $unidades_disponibles=$_POST["unidadesdisponibles"];
   $porcentaje_ganancias=$_POST["porcentajeganancia"];
   $id_categoria=$_POST["categoria"];
   $id_proveedor=$_POST["proveedor"];
   $fechaVencimiento=$_POST["fechaVencimiento"];
   $precioVenta=$_POST["precioVenta"];
   $precioCompra=$_POST["precioCompra"];

     $update1=mysqli_query($link, "UPDATE productos SET codigo_interno='$codigoInterno',nombre='$nombre',descripcion='$descripcion',unidades_disponible='$unidades_disponibles',porcentaje_ganancia=$porcentaje_ganancias,id_categoria='$id_categoria',id_proveedor='$id_proveedor' WHERE id_producto='$id_producto'");
     $update2=mysqli_query($link, "UPDATE detalle_producto SET fecha_vencimiento='$fechaVencimiento',precio_venta='$precioVenta',precio_compra='$precioCompra',id_producto='$id_producto' WHERE id_detalle_producto='$id_detalle_producto'");

     if ($update1) {

    if($update2)
     {
      echo "<script>
 	   location.replace('ListadoProductoMedicinal.php?q=$nombre&info=modificar');
            </script>";

     }}

     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
