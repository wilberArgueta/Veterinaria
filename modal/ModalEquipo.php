<?php include '../conectar.php' ?>
<?php include '../includes/head.php' ?>

<div class="modal fade" id="ModalAgregarEquipo" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registroequipo" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Equipo</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Codigo Interno </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="cod_interno" name="cod_interno" autocomplete="off" r>
				    </div>
	        </div> <!-- /form-group-->
	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre del Equipo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" >
				    </div>
	        </div> <!-- /form-group-->	

           <div class="form-group">
            <label for="brandName" class="col-sm-3 control-label">Tipo de Equipo </label>
            <label class="col-sm-1 control-label">: </label>
           <?php
                  include ('../conectar.php');
                  $consulta= mysqli_query($link, "SELECT * FROM categoria ORDER BY idcategoria ASC");
                  echo "<div class=\"col-sm-8\">";
                  echo "<select class=\"form-control js-example-basic-single\" id=\"idcategoria\" name=\"idcategoria\" style=\"width: 100%\" \"required\">";
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
	        	<label for="brandName" class="col-sm-3 control-label">Descripción del Equipo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea id="descripcion" name="descripcion" class="form-control" autocomplete="off" ></textarea>
				    </div>
	        </div> <!-- /form-group-->	


	       
	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Cantidad del Equipo</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="cantidad" name="cantidad" autocomplete="off" >
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
<script type="text/javascript" src="../js/frm.reg.equipo.js"></script>

<!-- / add modal -->




<?php 
if (isset($_POST['submit'])) {
  $cod_interno=$_POST["cod_interno"];
  $nombre=$_POST["nombre"];
  $idcategoria=$_POST["idcategoria"];
  $descripcion=$_POST["descripcion"];
  $cantidad=$_POST["cantidad"];

  $sql_comprueba_equipo="SELECT nombre FROM productos where cod_interno='$cod_interno'";
  $ejecuta_sql_equipo=mysqli_query($link,$sql_comprueba_equipo);
  $comprueba_equipo=mysqli_num_rows($ejecuta_sql_equipo);
  if ($comprueba_equipo==0) {
    $insertar=mysqli_query($link, "INSERT INTO productos(   idproducto,cod_interno,nombre,idcategoria,descripcion,cantidad) values ('','$cod_interno','$nombre','$idcategoria','$descripcion','$cantidad')");
    if ($insertar) {
      echo "<script>
        location.replace('../equipo/ListadoEquipo.php?q=$nombre&info=add');
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