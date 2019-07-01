<?php include '../conectar.php' ?>

<div class="modal fade" id="ModalAgregarExamen" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registroExamen" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar examen</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Tipo de examen </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="tipo_examen" name="tipo_examen" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	
	 

	        	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del examen </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" required></textarea>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Laboratorio </label>
	        	<label class="col-sm-1 control-label">: </label>
				   <?php
                  include ('../conectar.php');
                  $consulta_tipo_equipo= mysqli_query($link, "SELECT * FROM laboratorio");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"idlaboratorio\" name=\"idlaboratorio\" >";
                  while ($fila= mysqli_fetch_array($consulta_tipo_equipo)) {
                    if ($tipo==$fila['idlaboratorio']) {
                    echo "<option value='".$fila['idlaboratorio']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idlaboratorio']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                  echo "  </div>";
                ?>
	        </div> <!-- /form-group-->
	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Fecha del examen </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fecha_examen" name="fecha_examen" autocomplete="off" required>
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
<script type="text/javascript" src="../js/frm.reg.examen.js"></script>

<!-- / add modal -->




<?php
 if (isset($_POST['submit'])) {
     $tipo_examen=$_POST["tipo_examen"];
     $descripcion=$_POST["descripcion"];
     $idlaboratorio=$_POST["idlaboratorio"];
     $fecha_examen=$_POST["fecha_examen"];
     $precio=$_POST["precio"];
     
     

     $sql_comprueba_examen="SELECT tipo_examen FROM examen where tipo_examen='$tipo_examen'";
     $ejecuta_sql_examen=mysqli_query($link,$sql_comprueba_examen);
     $comprueba_examen=mysqli_num_rows($ejecuta_sql_examen);
     if ($comprueba_examen==0) {
         $insertar=mysqli_query($link,"INSERT INTO examen (   idexamen,tipo_examen,descripcion,idlaboratorio,fecha_examen,precio) values('','$tipo_examen','$descripcion','$idlaboratorio','$fecha_examen','$precio')");
         if ($insertar) {
             echo "<script>
                   location.replace('../examen/ListadoExamenes.php?q=$tipo_examen&info=add');
              </script>";
         } else {
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
               'El equipo ya existe!',
               'error'
    )</script>";
    mysqli_close($link);
  }

 }
 ?>