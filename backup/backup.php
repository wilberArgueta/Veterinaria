 <?php

include("conectar.php");
if(isset($_POST['crear'])){
  $target_path = getcwd();
  $now = str_replace(":", "", date("Y-m-d H:i"));
  $outputfilename = $db . '-' . $now . '.sql';
  $outputfilename = str_replace(" ", "-", $outputfilename);
  $save_path = $target_path . '/'.$outputfilename;
          
  $command = "mysqldump --user=$user --password=$pass $db > $outputfilename";
  shell_exec($command);
            
  //Para forzar la descarga del navegador
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary"); 
  header('Content-Disposition: attachment; filename='.basename($outputfilename));
  header('Content-Transfer-Encoding: binary');
  header("Content-Type: application/download");
  header("Content-Description: File Transfer"); 
  header("Content-Length: ".filesize($outputfilename));
  readfile($save_path);
         
  //Eliminar el archivo del servidor
  shell_exec('rm ' . $save_path);  
}

if($_FILES){
  $target_path = getcwd();
  $databasefilename = $_FILES["databasefile"]["name"];
  $save_path = $target_path . '/backup/';
  $restore_path = $target_path . '/backup/'.$databasefilename;
  //Subir archivo a directorio de backup
  move_uploaded_file($_FILES["databasefile"]["tmp_name"], $target_path . '/backup/' . $databasefilename);
  
  //Restaurando base de datos         
  $command="mysql --user=$user --password=$pass $db < $restore_path";
  exec($command,$result, $output);
  if($output != 0) {
    echo "Error al restauraurar base de datos";
  }else {
    echo "<script>alert('Datos restaurados con Exito');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Respaldo de datos</title>

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

            <form  role="form1" method="POST" action="" class="form-horizontal form-label-left" >
            <span class="section"> Crear Copia de Seguridad</span>

            <div class="item form-group">
               
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="hidden" name="crear" value="crear">
                  <button type="submit" class="btn btn-primary" style="width: 200px; height: 30px; font-size: 10pt; border-radius: 15px 15px 15px 15px;"><i class="fa fa-database"> </i>  Crear Copia </button>
                </div>
              </div>


            </div>
              </form>

               <div class="x_panel">

               <form  role="form2" method="POST" action="" class="form-horizontal form-label-left"  enctype="multipart/form-data">
            <span class="section">Restaurar Copia de Seguridad</span>

            <div class="item form-group">
            
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="file"  name="databasefile" /><br>
                  <button type="submit" class="btn btn-primary" style="width: 200px; height: 30px; font-size: 10pt; border-radius: 15px 15px 15px 15px;"><i class="fa fa-database"> </i> Restaurar </button>
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
  

</body>
</html>

a