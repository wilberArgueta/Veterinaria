<?php include '../conectar.php' ?>
<?php include '../includes/head.php' ?>

<div class="modal fade" id="ModalAgregarMedicinal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_NuevoProductoMedicinal" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Producto Medicinal</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Codigo Interno </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="codigointerno" name="codigointerno" autocomplete="off" r>
				    </div>
	        </div> <!-- /form-group-->
	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre del Producto </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del Producto </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" ></textarea>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Cantidad </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="cantidad" name="nombre" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->		

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Categoria </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('../conectar.php');
                  $consulta= mysqli_query($link, "SELECT * FROM cliente");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"categoria\" name=\"categoria\" style=\"width: 100%\" \"required\">";
                  while ($fila= mysqli_fetch_array($consulta)) {
                    if ($tipo==$fila['idcategoria']) {
                    echo "<option value='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
                    }
                    echo "<option vvalue='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
	        </div> <!-- /form-group-->   

	       <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Proveedor </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('../conectar.php');
                  $consulta_Proveedor= mysqli_query($link, "SELECT * FROM proveedor");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"proveedor\" name=\"proveedor\" style=\"width: 100%\" \"required\">";
                  while ($fila= mysqli_fetch_array($consulta_Proveedor)) {
                    if ($tipo==$fila['idproveedor']) {
                    echo "<option value='".$fila['idproveedor']."'>".$fila['nombre']."</option>";
                    }
                    echo "<option vvalue='".$fila['idproveedor']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
	        </div> <!-- /form-group-->   

	         <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Presentación </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="presentacion" name="presentacion" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->     

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Valor </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="valor" name="valor" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->   

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Fecha de vencimiento </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Precio de Compra </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="precioCompra" name="precioCompra" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group--> 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Precio de Venta </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="precioVenta" name="precioVenta" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group--> 


	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        
	        <button type="submit" name="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Agregar</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
 <?php include '../includes/script.php' ?>
<script type="text/javascript" src="../js/frm.reg.productoMedicinal.js"></script>

<!-- / add modal -->




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
                location.replace('../productoMedicinal/ListadoProductoMedicinal.php'q=$nombre&info=add');
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
