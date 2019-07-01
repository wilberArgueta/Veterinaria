<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
<?php include '../conectar.php' ?>
<?php include('../modal/Modalcliente.php');?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Listado de Clientes</title>
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
            <h1>Listado de Clientes</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Clientes</li>
              <li>Cliente</li>
              <li class="active">Listado de Clientes</li>
            </ol>
          </section>
        </div>
      </div>
    </div>
<form id= "formulario"  role= "form" method="GET">
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
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <br>
            <div class="title_left">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                <div class="input-group">
                  <button class="btn btn-primary button1" data-toggle="modal" data-target="#ModalAgregarCliente"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar cliente </button>
                </div>
              </div>
            </div>

        </div>
        <br>



        <?php
        if(isset($_GET["action"])){
          if($_GET["action"]== "del"){
            mysqli_query($link,"delete from cliente where idcliente ='$_GET[id]'");
            echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                   <strong>Exito</strong>
                   Registro eliminado.
                  </div>";
                 }
         }

      if(isset($_GET["q"])){

    $q = $_GET["q"];
    $query = @mysqli_query($link,"SELECT cliente.idcliente,cliente.nombre,cliente.apellido,cliente.direccion,cliente.telefono, mascota.nombre AS mascota FROM cliente INNER JOIN mascota ON cliente.idmascota = mascota.idmascota WHERE cliente.idcliente LIKE '%$q%' OR cliente.nombre LIKE '%$q%' order by idcliente");
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

        <<td>ID Cliente</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Dirección</td>
        <td>Télefono</td>
        <td>Mascota</td>
        <td>Acciones</td>

      </tr>";

      while($data = mysqli_fetch_array($query)){

        echo "<tr class=\"warning\">
         <td>$data[0]</td>
         <td>$data[nombre]</td>
         <td>$data[apellido]</td>
         <td>$data[direccion]</td>
         <td>$data[telefono]</td>
         <td>$data[mascota]</td>

         <td>
          </a>

          <a href='ModyCliente.php?id=$data[0]'><img src='../img/editar.png' border=0 title='Modificar' style='width: 40px; font-size:20px' title='Modificar'></a>


          <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el equipo $data[0]?q=$q'))
          {location.replace('$_SERVER[PHP_SELF]?action=del&id=$data[0]&q=$q')}\">
          <img src='../img/eliminar.png' border=0 title='Eliminar' style='width: 40px; font-size:20px' title='Eliminar'></a>
   </td>

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
