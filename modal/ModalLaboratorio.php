<?php include 'conectar.php' ?>

<div class="modal fade" id="ModalAgregarLaboratorio" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registrolaboratorio" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar laboratorio</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre del laboratorio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
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
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del laboratorio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" required></textarea>
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

<script type="text/javascript" src="js/frm.reg.laboratorio.js"></script>

<!-- / add modal -->




<?php
 if ($_POST) {
     $nombre=$_POST["nombre"];
     $direccion=$_POST["direccion"];
     $telefono=$_POST["telefono"];
     $correo=$_POST["email"];
     $descripcion=$_POST["descripcion"];

     $sql_comprueba_laboratorio="SELECT nombre FROM laboratorio where nombre='$nombre'";
     $ejecuta_sql_laboratorio=mysqli_query($link,$sql_comprueba_laboratorio);
     $comprueba_laaboratorio=mysqli_num_rows($ejecuta_sql_laboratorio);
     if ($comprueba_laaboratorio==0) {
         $insertar=mysqli_query($link,"INSERT INTO laboratorio (idlaboratorio,nombre,direccion,telefono,correo,descripcion) values('','$nombre','$direccion','$telefono','$correo','$descripcion')");
         if ($insertar) {
             echo "<script>
               location.replace('ListadoLaboratorio.php?q=$nombre&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El laboratorio ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>