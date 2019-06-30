<?php include 'conectar.php' ?>

<div class="modal fade" id="ModalAgregarUsuario" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="frm_registrousuario" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Usuario</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Usuario </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombreUsuario"  name="nombreUsuario" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Nombre Completo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombreCompleto"  name="nombreCompleto" autocomplete="off" required="">
				    </div>
	        </div> <!-- /form-group-->	 

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Apellido Completo </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="telefono"  name="telefono" autocomplete="off" required="">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Télefono </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="telefono"  name="telefono" autocomplete="off" ata-inputmask="'mask' : '9999-9999'" required>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Dirección </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="direccion"  name="direccion" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Contraseña </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password"  name="password" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Confirmar Contraseña </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password_confirmara_usuario"  name="password_confirmara_usuario" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Correo Eléctronico </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email"  name="email" autocomplete="off" required>
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
<!-- / add modal -->

<script src="js/frm.reg.usuario.js"></script>



<?php
 if ($_POST) {
     $nombreUsuario=$_POST["nombreUsuario"];
     $nombre=$_POST["nombreCompleto"];
     $apellido=$_POST["apellidoCompleto"];
     $telefono=$_POST["telefono"];
     $direccion=$_POST["direccion"];
     $clave=MD5($_POST["password"] );
     $correo=$_POST["email"];

     $sql_comprueba_user="SELECT nombre_usuario FROM usuario where nombre_usuario='$nombreUsuario'";
     $ejecuta_sql_user=mysqli_query($link,$sql_comprueba_user);
     $comprueba_user=mysqli_num_rows($ejecuta_sql_user);
     if ($comprueba_user==0) {
         $insertar=mysqli_query($link,"INSERT INTO usuario (idUsuario,nombreUsuario,nombre,apellido,telefono,direccion,clave,correo) values('','$nombreUsuario','$nombre','$apellido','$telefono','$direccion','$clave','$correo')");
         if ($insertar) {
             echo "<script>
                   location.replace('ListadoUsuarios.php?q=$nombreUsuario&info=add');
              </script>";
         } else {
             echo "<script>alert('Error al insertar');</script>";
         }
     } else {
         echo "<script>alert('El usuario ya existe');</script>";
         mysqli_close($link);
     }
 }
 ?>
