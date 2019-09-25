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
 $sql=mysqli_query($link,"SELECT p.cod_interno as cod_interno,p.nombre as producto,p.descripcion as descripcion,c.nombre as categoria,p.cantidad,pv.nombre as proveedor, dt.iddetalle_producto as iddetalle_producto,dt.presentacion as presentacion,dt.valor as valor,dt.precio_compra as precio_compra,dt.precio_venta as precio_venta ,dt.fecha_vencimiento as fecha_vencimiento FROM  productos as p  INNER JOIN categoria as c ON (p.idcategoria=c.idcategoria) INNER JOIN stock_movimiento AS st ON (st.idproducto =p.idproducto) INNER JOIN proveedor as pv ON (st.idproveedor=pv.idproveedor) INNER JOIN detalle_producto AS dt ON (st.idStock_movimiento =dt.idStock_movimiento) WHERE p.idproducto='$id'");

 $row=mysqli_fetch_array($sql);
 $idStock_movimiento=$row["idStock_movimiento"];
 $idmaterial=$row["idmaterial"];
 $codigoInterno=$row["cod_interno"];
 $nombre=$row["producto"];
 $descripcion=$row["descripcion"];
 $cantidad=$row["cantidad"];
 $precioVenta=$row["precio_venta"];
 $idcategoria=$row["categoria"];
 $idproveedor=$row["proveedor"];

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
  <title> | Clinica Veterinaria | Registrar Material</title>
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
            <h1>Nuevo Producto Material</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Materiales</li>
              <li class="active">Nuevo producto material</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id="frm_registromaterial" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos producto del material</h1>
              </section>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigoproducto">Codigo Interno del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="codigointerno" class="form-control col-md-7 col-xs-12"  name="codigointerno" type="text" value="<?php echo $codigoInterno?>">
                  <input id="idStock_movimiento" class="form-control col-md-7 col-xs-12"  name="idStock_movimiento" type="hidden" value="<?php echo $idStock_movimiento?>" >
                  <input id="idmaterial" class="form-control col-md-7 col-xs-12"  name="idmaterial" type="hidden" value="<?php echo $idmaterial?>">
                    <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text" value="<?php echo $nombre?>">
                    <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Descripción del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"><?php echo $descripcion?></textarea>
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_categoria">Categoria del Producto</label>

                    <?php
                      include ('../conectar.php');
                      $consulta_categoria= mysqli_query($link, "SELECT * FROM categoria");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"categoria\" name=\"categoria\" >";
                      while ($fila= mysqli_fetch_array($consulta_categoria)) {
                    if ($tipo==$fila['idcategoria']) {
                    echo "<option value='".$fila['idcategoria']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
                  }
                      echo "  </select>";
                      echo "  </div>";
                    ?>

                

              </div>

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_proveedor">Proveedor</label>

                    <?php
                      include ('../conectar.php');
                      $consulta_proveedor= mysqli_query($link, "SELECT * FROM proveedor");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"proveedor\" name=\"proveedor\" >";
                       while ($fila= mysqli_fetch_array($consulta_proveedor)) {
                    if ($tipo==$fila['idproveedor']) {
                    echo "<option value='".$fila['idproveedor']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idproveedor']."'>".$fila['nombre']."</option>";
                  }
                      echo "  </select>";
                      echo "  </div>";
                    ?>

                  <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarProveedor"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar proveedor </button>
              </div>

               

                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cantidad" class="form-control col-md-7 col-xs-12"  name="cantidad" type="text" value="<?php echo $cantidad?>">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                        
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio_venta">Precio venta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="precio_venta" class="form-control col-md-7 col-xs-12"  name="precio_venta"  type="text" value="<?php echo $precioVenta?>">
                              <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
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
  <script type="text/javascript" src="../js/frm.reg.material.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $idStock_movimiento=$_POST["idStock_movimiento"];
    $idmaterial=$_POST["idmaterial"];
    $codigoInterno=$_POST["codigointerno"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $categoria=$_POST["categoria"];
    $cantidad=$_POST["cantidad"];
    $precioVenta=$_POST["precio_venta"];
    $proveedor=$_POST["proveedor"];

     $update1=mysqli_query($link, "UPDATE productos SET cod_interno='$codigoInterno',nombre='$nombre',descripcion='$descripcion',idcategoria='$categoria',cantidad='$cantidad' WHERE idproducto='$id'");
     
     $update2=mysqli_query($link, "UPDATE stock_movimiento SET idproducto='$id',idproveedor='$proveedor',cantidad='$cantidad' WHERE idStock_movimiento='$idStock_movimiento'");
     
      $update3=mysqli_query($link, "UPDATE material SET idstockMovimiento='$idStock_movimiento', precio_venta='$precioVenta' WHERE idmaterial='$idmaterial'");

      if ($update1) {
      
    //echo "<script>alert('update1');</script>";
      if ($update2) {
      //echo "<script>alert('update2');</script>";
      } if($update3)
     {
      echo "<script>
     location.replace('../material/ListadoMateriales.php?q=$nombre&info=modificar');
            </script>";
     }} else
     {
       
        echo "<script>
                 swal(
              'Oops...',
               'Error al actualizar el registro!',
               'error'
             )</script>";
     }

  }
?>