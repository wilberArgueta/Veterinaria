<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>

<?php
if($_GET)
{
 include("../conectar.php");
 $id=$_GET["id"];
 $sql=mysqli_query($link,"SELECT * FROM productos WHERE idproducto='$id'");
 $row=mysqli_fetch_array($sql);
 $cod_interno=$row["cod_interno"];
 $nombre=$row["nombre"];
 $idcategoria=$row["idcategoria"];
 $descripcion=$row["descripcion"];
 $cantidad=$row["cantidad"];

 }
 else
 {
  $cod_interno="";
 echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
 <strong>Error</strong> No se han enviado variables</div>";
 }

?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar Equipo</title>
  <?php include '../includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include '../includes/nav.php' ?>
  <?php include '../includes/cerrarSesion.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Modificar Equipo</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Equipo</li>
              <li class="active">Modificar Equipo</li>
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
                  <input id="cod_interno" class="form-control col-md-7 col-xs-12" name="cod_interno" type="text" value="<?php echo $cod_interno ?>">
                  <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre"  type="text" value="<?php echo $nombre ?>">
                  <span class="fa fa-shopping-cart form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcategoria">Tipo de Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php
                  include ('../conectar.php');
                  $consulta_equipo= mysqli_query($link, "SELECT * FROM categoria");
                    
                  echo "<select class=\"form-control js-example-basic-single col-md-7 col-xs-12\" id=\"idcategoria\" name=\"idcategoria\" >";
                  while ($fila= mysqli_fetch_array($consulta_equipo)) {
                    if ($tipo==$fila['idcategoria']) {
                    echo "<option value='".$fila['idcategoria']."' selected>".$fila['nombre']."</option>";
                    }
                    echo "<option value='".$fila['idcategoria']."'>".$fila['nombre']."</option>";
                  }
                  echo "  </select>";
                    
                ?>
                </div>
            </div>

              

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="descripcion"  name="descripcion" class="form-control col-md-7 col-xs-12"><?php echo $descripcion ?></textarea>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad">Cantidad del Equipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="cantidad" class="form-control col-md-7 col-xs-12"  name="cantidad" type="text" value="<?php echo $cantidad ?>">
                  <span class="fa fa-paper-plane-o form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>

               


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-success" >Cancelar</button>
                    <button id="registrar" type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
    <?php include '../includes/footer.php' ?>
  <?php include '../includes/script.php' ?>
    <script type="text/javascript" src="../js/frm.reg.equipo.js"></script>

</body>
</html>
<?php
 if (isset($_POST['submit'])) {
   $cod_interno=$_POST["cod_interno"];
  $nombre=$_POST["nombre"];
  $idcategoria=$_POST["idcategoria"];
  $descripcion=$_POST["descripcion"];
  $cantidad=$_POST["cantidad"];

     $update=mysqli_query($link, "UPDATE productos SET cod_interno='$cod_interno',nombre='$nombre',idcategoria='$idcategoria',descripcion='$descripcion',cantidad='$cantidad' WHERE idproducto='$id'");
     if($update)
     {
      echo "<script>
     location.replace('../equipo/ListadoEquipo.php?q=$nombre&info=modificar');
            </script>";

     }
     else
     {
       echo "<script>alert('Error al actualizar el registro');</script>";
     }

  }
  ?>
