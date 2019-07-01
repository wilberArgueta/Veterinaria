<?php include '../conectar.php' ?>
  <?php include '../includes/head.php' ?>
<div class="modal fade" id="ModalAgregarCliente" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registrocliente" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar cliente</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre completo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->
	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Apellido completo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="apellido" name="apellido" autocomplete="off" required>
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
	        	<label for="brandStatus" class="col-sm-3 control-label">Mascota: </label>
	        	<label class="col-sm-1 control-label">: </label>

	        	<?php
                  include ('../conectar.php');
                  $consulta_mascota= mysqli_query($link, "SELECT * FROM mascota");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single \" id=\"mascota\" name=\"mascota\" >";
                  while ($fila= mysqli_fetch_array($consulta_mascota)) {
                    if ($tipo==$fila['idmascota']) {
                    echo "<option value='".$fila['idmascota']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idmascota']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
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
 <?php include '../includes/script.php' ?>
<script type="text/javascript" src="../js/frm.reg.cliente.js"></script>

<!-- / add modal -->

<?php
 if (isset($_POST['submit'])) {
     $nombre=$_POST["nombre"];
     $apellido=$_POST["apellido"];
     $direccion=$_POST["direccion"];
     $telefono=$_POST["telefono"];
     $mascota=$_POST["mascota"];

     $update=mysqli_query($link, "UPDATE cliente SET nombre='$nombre',apellido='$apellido',direccion='$direccion',telefono= $telefono,idmascota='$mascota' WHERE idcliente='$id'");

     if($update)
     {
      echo "<script>
     location.replace('../cliente/ListadoCliente.php?q=$nombre&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>