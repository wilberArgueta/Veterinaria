<?php include '../conectar.php' ?>
<?php include '../includes/head.php' ?>

<div class="modal fade" id="ModalAgregarMaterial" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registromaterial" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Producto Material</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Codigo Interno </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="codigoproducto" name="codigoproducto" autocomplete="off" r>
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
	        	<label for="brandName" class="col-sm-3 control-label">Categoria </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('../conectar.php');
                  $consulta= mysqli_query($link, "SELECT * FROM categoria");
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
	        	<label for="brandName" class="col-sm-3 control-label">Cantidad </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="cantidad" name="cantidad" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->		 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Precio de Venta </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="precio_venta" name="precio_venta" autocomplete="off" >
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
<script type="text/javascript" src="../js/frm.reg.material.js"></script>

<!-- / add modal -->




<?php
if (isset($_POST['submit'])){
    $codigoInterno=$_POST["codigoproducto"];
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
 