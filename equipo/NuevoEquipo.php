<?php include 'conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Registrar Equipo</title>
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
            <h1>Nuevo Equipo</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Equipo</li>
              <li class="active">Nuevo Equipo</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registroequipo" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos del Equipo</h1>
              </section>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cod_interno">Codigo Interno</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="cod_interno" class="form-control col-md-7 col-xs-12" name="cod_interno" type="text">
                  <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre"  type="text">
                  <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcategoria">Tipo de Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php
                  $consulta_tipo_equipo=mysqli_query($link,"SELECT * FROM categoria ORDER BY idcategoria ASC ");

                   echo " <select  class=\"form-control\" id=\"idcategoria\" title=\"Has clic para desplegar\" name=\"idcategoria\" >";
                   echo "<option value=''>Seleccione..</option>";

                  while($fila=mysqli_fetch_array($consulta_tipo_equipo)){
                       echo "<option value='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
                   }
                   echo "  </select>";
                   ?>
                </div>
            </div>

              

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="cantidad" class="form-control col-md-7 col-xs-12"  name="cantidad" type="text">
                  <span class="fa fa-paper-plane-o form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

               


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                    <button id="registrar" type="submit" class="btn btn-primary">Registrar</button>
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
    <script type="text/javascript" src="js/frm.reg.equipo.js"></script>

</body>
</html>
<?php 
if ($_POST) {
  $cod_interno=$_POST["cod_interno"];
  $nombre=$_POST["nombre"];
  $idcategoria=$_POST["idcategoria"];
  $descripcion=$_POST["descripcion"];
  $cantidad=$_POST["cantidad"];

  $sql_comprueba_servicio="SELECT nombre FROM productos where cod_interno='$cod_interno'";
  $ejecuta_sql_servicio=mysqli_query($link,$sql_comprueba_servicio);
  $comprueba_servicio=mysqli_num_rows($ejecuta_sql_servicio);
  if ($comprueba_servicio==0) {
    $insertar=mysqli_query($link, "INSERT INTO productos(   idproducto,cod_interno,nombre,idcategoria,descripcion,cantidad) values ('','$cod_interno','$nombre','$idcategoria','$descripcion','$cantidad')");
    if ($insertar) {
      echo "<script>
        location.replace('ListadoEquipo.php?q=$nombre&info=add');
      </script>";
    } else {
      echo "<script>
      alert('Error al insertar');
      </script>";
    }
  } else {
    echo "<script>
    alert('El servicio ya existe');
    </script>";
    mysqli_close($link);
  }

}
 ?>