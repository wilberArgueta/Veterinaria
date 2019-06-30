<?php include ('conectar.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Mascota</title>

  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <?php include 'includes/cerrarSesion.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Nueva Mascota</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Cliente</li>
              <li>Mascota</li>
              <li class="active">Nueva Mascota</li>
            </ol>
          </section>
        </div>
      </div>
  </div> 

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            <form  method="post" role="form" id="frm_nuevaMascota" class="form-horizontal form-label-left">
            <span class="section">Datos de la mascota</span>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expedienteMascota">Expediente de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="expedienteMascota" class="form-control col-md-7 col-xs-12"  name="expedienteMascota" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombremascota" class="form-control col-md-7 col-xs-12"  name="nombremascota" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="raza">Raza de la mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="raza" class="form-control col-md-7 col-xs-12" name="raza" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edadMascota">Edad de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="edadMascota" class="form-control col-md-7 col-xs-12"  name="edadMascota" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peso">Peso de la Mascota (kg)</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="peso" class="form-control col-md-7 col-xs-12"  name="peso" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla">Talla de la Mascota (cm)</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="talla" class="form-control col-md-7 col-xs-12"  name="talla" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
              <!--
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero">Genero de la Mascota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="genero" class="form-control col-md-7 col-xs-12"  name="genero" type="text">
                  <span class="fa fa-paw form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
               -->
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="genero" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="genero" value="Macho"> &nbsp; Macho &nbsp;
                    </label>
                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="genero" value="Hembra"> Hembra
                    </label>
                  </div>
                </div>
              </div>

              

            
              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Cancelar</button>
                      <input class="btn btn-md btn-primary" id="submit" type="submit" name="submit" value="Registrar">
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>

   
    <?php include 'includes/footer.php' ?>
    <?php include 'includes/script.php' ?>
   
  <script src="js/frm.reg.mascota.js"></script>

</body>
</html>

<?php
 if ($_POST) {
     $expediente=$_POST["expedienteMascota"];
     $nombremascota=$_POST["nombremascota"];
     $raza=$_POST["raza"];
     $edad=$_POST["edadMascota"];
     $peso=$_POST["peso"];
     $talla=$_POST["talla"];
     $genero=$_POST["genero"];
    

     $sql_comprueba_mascota="SELECT nombre FROM mascota where nombre='$nombremascota'";
     $ejecuta_sql_mascota=mysqli_query($link,$sql_comprueba_mascota);
     $comprueba_mascota=mysqli_num_rows($ejecuta_sql_mascota);
     if ($comprueba_mascota==0) {
         $insertar=mysqli_query($link,"INSERT INTO mascota (idmascota,expediente,nombre,raza,edad,peso,talla,genero) values('','$expediente','$nombremascota','$raza','$edad','$peso','$talla','$genero')");
         if ($insertar) {
             echo "<script>
                   location.replace('ListadoMascota.php?q=$nombremascota&info=add');
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