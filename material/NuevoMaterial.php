<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>

<?php include('../conectar.php') ?>
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
                  <input id="codigointerno" class="form-control col-md-7 col-xs-12"  name="codigointerno" type="text">
                    <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                    <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Descripción del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>
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
    									include ('../conectar.php');
                      $consulta_proveedor= mysqli_query($link, "SELECT * FROM proveedor");
    									echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
    									echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"proveedor\" name=\"proveedor\" >";
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cantidad" class="form-control col-md-7 col-xs-12"  name="cantidad" type="text">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                        
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio_venta">Precio venta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="precio_venta" class="form-control col-md-7 col-xs-12"  name="precio_venta"  type="text">
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
if (isset($_POST['submit'])){
    $codigoInterno=$_POST["codigointerno"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $categoria=$_POST["categoria"];
    $cantidad=$_POST["cantidad"];
    $precioVenta=$_POST["precio_venta"];
    $proveedor=$_POST["proveedor"]; 
    

    $sql_comprueba_material="SELECT * FROM productos where nombre='$nombre' or cod_interno= '$codigoInterno'";
    $ejecuta_sql_material=mysqli_query($link,$sql_comprueba_material);
    $comprueba_material=mysqli_num_rows($ejecuta_sql_material);
    if ($comprueba_material==0) {

     $insertar1=mysqli_query($link,"INSERT INTO productos (idproducto,cod_interno,nombre,descripcion,idcategoria,cantidad) values('','$codigoInterno','$nombre','$descripcion','$categoria','$cantidad')");

      $insertar2=mysqli_query($link,"INSERT INTO stock_movimiento (idStock_movimiento,idproducto,idproveedor,cantidad) values('',LAST_INSERT_ID(),'$proveedor','$cantidad')");

      $insertar3=mysqli_query($link,"INSERT INTO material (idmaterial,idstockMovimiento,precio_venta) values('',LAST_INSERT_ID(),'$precioVenta')");


if ($insertar1) {
    
          if ($insertar2) {
            
           }
          if ($insertar3) {
            echo "<script>
                location.replace('../material/ListadoMateriales.php');
               </script>";
          }}
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
               'El Material ya existe!',
               'error'
               )</script>";

         mysqli_close($link);
     }
 }
?>
 