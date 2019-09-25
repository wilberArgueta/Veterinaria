<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
include '../conectar.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title> | Clinica Veterinaria | Listado de Mascota</title>
  <?php include '../includes/head.php'?>
</head>

<body class="nav-md">
  <?php include '../includes/nav.php'?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Listado de mascotas</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Clientes</li>
              <li>Mascota</li>
              <li class="active">Listado de mascota</li>
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
                    <input type="text" id="q" name="q" class="form-control" placeholder="Buscar..." value="<?php if (isset($_GET["q"])) {
    echo $_GET["q"];
}
?>">

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

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <br>
          <div class="title_left">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
              <div class="input-group">
                <a href="nuevo.php">
                  <button class="btn btn-primary button1"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar mascota
                  </button>
                </a>
              </div>
            </div>
          </div><br><br><br>


          <?php
if (isset($_GET["action"])) {
    if ($_GET["action"] == "del") {
        mysqli_query($link, "delete from mascota where id_mascota ='$_GET[id]'");
        echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                 <strong>Exito</strong>
                 Registro eliminado.
                </div>";
    }
}

if (isset($_GET["q"])) {

    $q = $_GET["q"];
    $query = @mysqli_query($link, "SELECT * FROM mascota WHERE nombre LIKE '%$q%' OR nombre LIKE '%$q%' order by nombre");

    if (!@mysqli_num_rows($query)) {
        echo "<br><div class=\"alert alert alert-danger\" role=\"alert\">
           <strong>Error</strong>
           No se produjeron resultados.
          </div>";
    } else {
        $nrows = mysqli_num_rows($query);

        if (isset($_GET["info"])) {
            if ($_GET["info"] == "add") {
                echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
           <strong>Exito</strong>
          Registro agregado.
         </div>";
            }

            if ($_GET["info"] == "modificar") {
                echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
            <strong>Exito</strong>
          Registro Modificado.
         </div>";
            }

        } else {

            echo "<br><a href=\"#\">
                           Registros encontrados:
                       <span class=\"badge\">$nrows</span>
                       </a>";
        }

        echo " <center>
    <div class=\"table-responsive\">
<table class=\"table table-bordered table-hover\" >
        <tr>
      <td>ID mascota</td>
      <td>Expediente</td>
      <td>Nombre</td>
      <td>Raza</td>
      <td>Edad </td>
      <td>Peso (kg)</td>
      <td>Talla (cm)</td>
      <td>Genero</td>
      <td>Acciones</td>

    </tr>";

        while ($data = mysqli_fetch_array($query)) {

            echo "<tr class=\"warning\">
      <td> $data[0]</td>
      <td>$data[expediente]</td>
      <td>$data[nombre]</td>
      <td>$data[raza]</td>
      <td>$data[edad]</td>
      <td>$data[peso]</td>
      <td>$data[talla]</td>
      <td>$data[genero]</td>

      <td>
        </a>

        <a href='modificar.php?id=$data[0]'><img src='../img/editar.png' border=0 title='Modificar' style='width: 40px; font-size:20px' title='Modificar'></a>


        <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el registro?'))
        {location.replace('$_SERVER[PHP_SELF]?action=del&id=$data[0]')}\">
        <img src='../img/eliminar.png' border=0 title='Eliminar' style='width: 40px; font-size:20px' title='Eliminar'></a>
</td>

      </tr> ";
        }
        echo "</table></center>";

    }
}
else{
  echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
          Lista de Mascotas
         </div>";
  $query = @mysqli_query($link, "SELECT * FROM mascota");
  echo " <center>
    <div class=\"table-responsive\">
<table class=\"table table-bordered table-hover\" >
        <tr>
      <td>ID mascota</td>
      <td>Expediente</td>
      <td>Nombre</td>
      <td>Raza</td>
      <td>Edad </td>
      <td>Peso (kg)</td>
      <td>Talla (cm)</td>
      <td>Genero</td>
      <td>Acciones</td>

    </tr>";

        while ($data = mysqli_fetch_array($query)) {

            echo "<tr class=\"warning\">
      <td> $data[0]</td>
      <td>$data[expediente]</td>
      <td>$data[nombre]</td>
      <td>$data[raza]</td>
      <td>$data[edad]</td>
      <td>$data[peso]</td>
      <td>$data[talla]</td>
      <td>$data[genero]</td>

      <td>
        </a>

        <a href='modificar.php?id=$data[0]'><img src='../img/editar.png' border=0 title='Modificar' style='width: 40px; font-size:20px' title='Modificar'></a>


        <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el registro?'))
        {location.replace('$_SERVER[PHP_SELF]?action=del&id=$data[0]')}\">
        <img src='../img/eliminar.png' border=0 title='Eliminar' style='width: 40px; font-size:20px' title='Eliminar'></a>
</td>

      </tr> ";
        }
        echo "</table></center>";

    
}
?>
        </div>


      </div>
    </div>
  </div>
  </div>

  <?php include 'includes/footer.php'?>


  <?php include 'includes/script.php'?>

</body>

</html>