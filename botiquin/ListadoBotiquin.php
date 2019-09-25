
<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
?>
<?php include '../conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Listado de Botiquin</title>
  <?php include '../includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include '../includes/nav.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Listado de Botiquin</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Botiquin</li>
              <li class="active">Listado de Botiquin</li>
            </ol>
          </section>
        </div>
      </div>
    </div>
<form method="GET" role="form" id="formulario">
        <div class="">
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" id="q" name="q" class="form-control" placeholder="Buscar..."
                      value="<?php if(isset($_GET["q"]))echo $_GET["q"]; ?>">

                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>

    


            <?php
            

          if(isset($_GET["q"])){

        $q = $_GET["q"];
        $query = @mysqli_query($link,"SELECT b.cod_estudiante as cod_estudiante,b.nombre_estudiante as estudiante,b.descripcion as descripcion,p.nombre  as producto, dtb.cantidad as cantidad
          FROM detalle_botiquin as dtb INNER JOIN productos as p on dtb.idproducto=p.idproducto INNER JOIN botiquin as b ON dtb.idbotiquin= b.id_botiquin ");
        if(!@mysqli_num_rows($query)){
          echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
                 <strong>Error</strong>
                 No se produjeron resultados.
                </div>";
        }else{
          $nrows = mysqli_num_rows($query);

          if (isset($_GET["info"])){
            if ($_GET["info"] == "add")
                echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                 <strong>Exito</strong>
                Registro agregado.
               </div>";

            if ($_GET["info"] == "modificar")
              echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                  <strong>Exito</strong>
                Registro Modificado.
               </div>";
          }else{

                 echo "<br><a href=\"#\">
                                  Registros encontrados:
                              <span class=\"badge\">$nrows</span>
                              </a>";
          }

          echo "<p></p>
          <center>
           <div class=\"table-responsive\">
       <table class=\"table table-bordered table-hover\" >

    
            <td>Carnet</td>
            <td>Estudiante</td>
             <td>Descripcion </td>
            <td>Producto</td>
            <td>Cantidad</td>
             

          </tr>";

          while($data = mysqli_fetch_array($query)){

            echo "<tr class=\"warning\">
       
             <td>$data[cod_estudiante]</td>
             <td>$data[estudiante]</td>
             <td>$data[descripcion]</td>
             <td>$data[producto]</td>
             <td>$data[cantidad]</td>

            </tr> ";
          }
          echo "</table></center><br></br>

          ";

        }
       }
       ?>


      </div>
    </div>
  </div>
</div>

</div>
<?php include '../includes/footer.php' ?>
      
</div>
</div>
<?php include '../includes/script.php' ?>
  
</body>
</html>
