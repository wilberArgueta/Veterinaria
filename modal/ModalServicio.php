<?php include '../conectar.php' ?>
  <?php include '../includes/head.php' ?>

<div class="modal fade" id="ModalAgregarServicio" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registroservicio" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar servicio</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Tipo de servicio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="tipo_servicio" name="tipo_servicio" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	
	 

	        	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del servicio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Cliente </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('conectar.php');
                  $consulta_tipo_equipo= mysqli_query($link, "SELECT * FROM cliente");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"idcliente\" name=\"idcliente\" \"required\">";
                  while ($fila= mysqli_fetch_array($consulta_tipo_equipo)) {
                    if ($tipo==$fila['idcliente']) {
                    echo "<option value='".$fila['idcliente']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idcliente']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
	        </div> <!-- /form-group-->
	   

	         <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Precio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="precio" name="precio" autocomplete="off" required>
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
 <script type="text/javascript" src="../js/frm.reg.servicio.js"></script>
<!-- / add modal -->



<?php 
if isset(($_POST['submit'])) {
  $tipo_servicio=$_POST["tipo_servicio"];
  $descripcion=$_POST["descripcion"];
  $idcliente=$_POST["idcliente"];
  $precio=$_POST["precio"];


  $sql_comprueba_servicio="SELECT tipo_servicio FROM servicios where tipo_servicio='$tipo_servicio'";
  $ejecuta_sql_servicio=mysqli_query($link,$sql_comprueba_servicio);
  $comprueba_servicio=mysqli_num_rows($ejecuta_sql_servicio);
  if ($comprueba_servicio==0) {
    $insertar=mysqli_query($link, "INSERT INTO servicios(id_servicio,tipo_servicio,descripcion,idcliente,precio) values ('','$tipo_servicio','$descripcion','$idcliente','$precio')");
    if ($insertar) {
      echo "<script>
        location.replace('../servicios/ListadoServicios.php?q=$tipo_servicio&info=add');
      </script>";
    }else {
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
               'El registro ya existe!',
               'error'
               )</script>";
         mysqli_close($link);
     }

}
 ?>



