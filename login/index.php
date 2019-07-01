<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>  Clínica Veterinaria Univo | Inicio de seción</title>
	<link rel="stylesheet" href="../css/css-login/estilo-login.css">
	<link rel="stylesheet" type="text/css" href="../css/css-login/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/css-login/AdminLTE.min.css">
	<script src="../js/sweetalert2.all.js"></script>
	<link rel="shortcut icon" href="../img/Univo-logo.png">
</head>
<body class="login-page bg-login">
	<div class="login-box">
		<div class="login-logo">
			<img  src="../img/Univo-logo.png" alt="Logo">
		</div>

		<div class="login-box-body-3">
			<p class="login-box-msg"><i class="fa fa-user icon-title"></i> Por favor inicie sesión</p><br/>
			<form role="form" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="usuario" placeholder="Usuario" id="usuario" utocomplete="off" />
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" />
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-md-12">
					<button class="btn btn-md btn-primary btn-block" type="submit" name="submit" aria-pressed="true">Entrar</button>
					</div>
        </div>
				

			</form>
		</div>
	</div>
</body>
</html>
<?php
include("../conectar.php"); //incluimos el archivo que se conecta a la base de datos
 if (isset($_POST['submit'])) { //comprobamos si se envían variables desde el form por el método POST
   $usuario=$_POST["usuario"]; //Capturamos lo digitado por el usuario en la caja de texto de nombre usuario
   $clave=MD5($_POST["clave"]); //Capturamos lo digitado por el usuario en la caja de texto de nombre clave

   $sql_user="SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND clave='$clave'"; //String de la consulta
   $consulta=mysqli_query($link, $sql_user); //Ejecuto la consulta y la almaceno en una variable
   $contar=mysqli_num_rows($consulta); //Verifico si la consulta devuelve alguna fila
   if ($contar > 0) { //Si devuelve alguna fila le permitimos el acceso
    $_SESSION['acceso']=true;
     header("Location:../home/"); //direccionamos a la pagina de usuarios registrados
     mysql_close($link); //cerramos conexion con la base de datos
     die();
   } else {
     echo "<script>
             swal(
               'Oops...',
               'Usuario o contraseña incorrectos!',
               'error'
             )</script>";//arroja un mensaje de error si algún campo no son correctos
     mysqli_close($link); //cerramos la conexión con la base de datos.
   }
 }


?>
