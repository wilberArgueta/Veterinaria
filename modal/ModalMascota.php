<?php include '../conectar.php' ?>
  <?php include '../includes/head.php' ?>
<div class="modal fade" id="ModalAgregarMascota" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_nuevaMascota" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar mascota</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Expediente </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="expedienteMascota" name="expedienteMascota" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->
	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombremascota" name="nombremascota" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Raza </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="raza" name="raza" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->
	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Edad </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="edadMascota" name="edadMascota" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->		

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Peso </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="peso" name="peso" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Talla </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="talla" name="talla" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Genero </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="genero" name="genero" autocomplete="off" >
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
<script type="text/javascript" src="../js/frm.reg.mascota.js"></script>

<!-- / add modal -->




<?php
 if (isset($_POST['submit'])) {
     $expediente=$_POST["expedienteMascota"];
     $nombremascota=$_POST["nombremascota"];
     $raza=$_POST["raza"];
     $edad=$_POST["edadMascota"];
     $peso=$_POST["peso"];
     $talla=$_POST["talla"];
     $genero=$_POST["genero"];


     $update=mysqli_query($link, "UPDATE mascota SET expediente= '$expediente',nombre='$nombremascota',raza='$raza',edad='$edad',peso='$peso',talla='$talla',genero='$genero' WHERE idmascota='$id'");
     if($update)
     {
      echo "<script>
     location.replace('../cliente/NuevoCliente.php');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>