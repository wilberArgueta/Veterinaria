<?php include 'conectar.php' ?>

<div class="modal fade" id="ModalAgregarProveedor" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registroProveedores" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Proveedor</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre del Proveedor </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Encargado </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="contacto"  name="contacto" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Dirección </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="direccion" name="direccion" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Télefono </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="telefono" name="telefono" autocomplete="off" ata-inputmask="'mask' : '9999-9999'" required>
				    </div>
	        </div> <!-- /form-group-->
	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Correo Eléctronico </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->		

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Observaciones </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="observacion" name="observacion" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->		         	        
	        	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Agregar</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>

<script src="js/frm.reg.proveedores.js"></script>
<!-- / add modal -->




<?php
 if ($_POST) {
     $nombre=$_POST["nombre"];
     $direccion=$_POST["direccion"];
     $telefono=$_POST["telefono"];
     $contacto=$_POST["contacto"];
      $correo=$_POST["email"];
     $observacion=$_POST["observacion"];

     $sql_comprueba_proveedor="SELECT nombre FROM proveedor where nombre='$nombre'";
     $ejecuta_sql_proveedor=mysqli_query($link,$sql_comprueba_proveedor);
     $comprueba_proveedor=mysqli_num_rows($ejecuta_sql_proveedor);
     if ($comprueba_proveedor==0) {
         $insertar=mysqli_query($link,"INSERT INTO proveedor (idproveedor,nombre,direccion,telefono,correo,contacto,observacion) values('','$nombre','$direccion','$telefono','$correo','$contacto','$observacion')");
         if ($insertar) {
             echo "<script>
               location.replace('listadoProveedores.php?q=$nombre&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El proveedor ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>

