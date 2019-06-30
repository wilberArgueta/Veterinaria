<?php include('conectar.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Material</title>
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
            <h1>Nuevo Producto Material</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
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
            <form method="post" role="form" id= "frm_registromaterial" class="form-horizontal form-label-left" novalidate>
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
                    <input id="nombreMaterial" class="form-control col-md-7 col-xs-12" name="nombre"  required="required" type="text">
                    <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Descripción del Producto</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="descripcionmaterial" required="required" name="descripcionmaterial" class="form-control col-md-7 col-xs-12"></textarea>
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="porcentajeganacias">Porcentaje de Ganancia</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="porcentajeganancias" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="porcentajeganancias"  required="required" type="text">
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

    										echo "<option value='".$fila['id_proveedor']."'>".$fila['nombre']."</option>";
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

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_proveedor">Presentacion</label>

                    <?php
                      include ('conectar.php');
                      $consulta_presentacion= mysqli_query($link, "SELECT * FROM presentacion");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"presentacion\" name=\"presentacion\" >";
                      while ($fila= mysqli_fetch_array($consulta_presentacion)) {

                        echo "<option value='".$fila['id_presentacion']."'>".$fila['nombre']."</option>";
                      }
                      echo "  </select>";
                      echo "  </div>";
                    ?>

                    <a href="#">
                  <button type="button" class="btn btn-light" style="width: 220px; ">
                    <i class="fa fa-plus"> Agregar nueva Presentacion</i>
                  </button> 
                </a>
              </div>



                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="valor" class="form-control col-md-7 col-xs-12"  name="valor" type="text">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>

                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cantidad" class="form-control col-md-7 col-xs-12"  name="cantidad" type="text">
                    <span class="fa fa-eyedropper form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>


                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="precio" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="precio"  required="required" type="text">
                              <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

               
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de la consulta</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                              <input type='text' class="form-control" name="fecha" id="fecha" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
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
    <?php include 'includes/footer.php' ?>
  <?php include 'includes/script.php' ?>
<script type="text/javascript" src="js/frm.reg.material.js">

</script>
</body>
</html>
<?php
 if ($_POST) {
     $codigoInterno=$_POST["codigointerno"];
     $nombre=$_POST["nombre"];
     $descripcion=$_POST["descripcionmaterial"];
     $unidades_disponibles=$_POST["unidadesdisponibles"];
     $porcentaje_ganancias=$_POST["porcentajeganancias"];
     $id_categoria=$_POST["categoria"];
     $id_proveedor=$_POST["proveedor"];

     $sql_comprueba_producto="SELECT * FROM productos where nombre='$nombre' AND cod_interno= '$codigoInterno' ";
     $ejecuta_sql_producto=mysqli_query($link,$sql_comprueba_producto);
     $comprueba_producto=mysqli_num_rows($ejecuta_sql_producto);
     if ($comprueba_producto==0) {

      $insertar=mysqli_query($link,"INSERT INTO productos (id_producto,cod_interno,nombre,descripcion,porcentaje_ganancia,id_categoria,id_presentacion,idStock_movimiento, precio_venta) values('','$codigoInterno','$nombre','$descripcion','$unidades_disponibles',$porcentaje_ganancias,'$id_categoria','$id_proveedor')");

          if ($insertar) {
              echo "<script>
                location.replace('ListadoMateriales.php');
               </script>";
          }
          else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El material ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>
