<?php include '../conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Respaldo de datos</title>

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
            <h1>Respaldo de datos</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>/ Respaldo</li>
              <li class="active">Respaldo de datos</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            <form  role="form" method="POST" action="" class="form-horizontal form-label-left">
            <span class="section">Crear Copia de Seguridad</span>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Reporte General de Usuarios</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="submit" class="btn btn-primary" style="width: 200px; height: 30px; font-size: 10pt; border-radius: 15px 15px 15px 15px;"><i class="fa fa-print"></i>     Generar reporte</button>
                </div>
              </div>
              <input type="hidden" name="crear" value="crear">
            <input type="submit" value="Crear Copia">

              

              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
    <?php include '../includes/footer.php' ?>
  <?php include '../includes/script.php' ?>
  

</body>
</html>

