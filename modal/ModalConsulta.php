<?php include '../conectar.php' ?>
<?php include '../includes/head.php' ?>

<div class="modal fade" id="ModalAgregarConsulta" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registroconsulta" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Consulta</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Cliente </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('../conectar.php');
                  $consulta= mysqli_query($link, "SELECT * FROM cliente");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"idcliente\" name=\"idcliente\" \"required\">";
                  while ($fila= mysqli_fetch_array($consulta)) {
                    if ($tipo==$fila['idcliente']) {
                    echo "<option value='".$fila['idcliente']."' selected>".$fila['nombre'].$fila['apellido']."</option>";
                    }
                    echo "<option value='".$fila['idcliente']."'>".$fila['nombre'].$fila['apellido']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
	        </div> <!-- /form-group-->
	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del laboratorio </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Constancia Fisiologica </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="c_fisiologica" name="c_fisiologica" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Tratamiento </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="tratamiento" name="tratamiento" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	



	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Fecha de la consulta </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" autocomplete="off" required>
				    </div>
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
<script type="text/javascript" src="../js/frm.reg.consulta.js"></script>

<!-- / add modal -->




<?php
 if (isset($_POST['submit'])) {
     $idcliente=$_POST["idcliente"];
     $descripcion=$_POST["descripcion"];
     $c_fisiologica=$_POST["c_fisiologica"];
     $tratamiento=$_POST["tratamiento"];
      $fecha_ingreso=$_POST["fecha_ingreso"];
     $precio=$_POST["precio"];

     $sql_comprueba_consulta="SELECT idcliente FROM consulta where idcliente='$idcliente'";
     $ejecuta_sql_consulta=mysqli_query($link,$sql_comprueba_consulta);
     $comprueba_consulta=mysqli_num_rows($ejecuta_sql_consulta);
     if ($comprueba_consulta==0) {
         $insertar=mysqli_query($link,"INSERT INTO consulta (idconsulta,idcliente,descripcion,c_fisiologica,tratamiento,fecha_ingreso,precio) values('','$idcliente','$descripcion','$c_fisiologica','$tratamiento','$fecha_ingreso','$precio')");
         if ($insertar) {
             echo "<script>
               location.replace('../consulta/ListadoConsultas.php?q=$idconsulta&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('La consulta ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>