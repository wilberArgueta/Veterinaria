<<<<<<< HEAD:venta/ListadoVentas.php
<?php 
session_start();
if (!$_SESSION['acceso']) {
  header("Location:../login/");
}
 ?>
 <?php include '../conectar.php'; ?>
=======
<?php
session_start();
if (!$_SESSION['acceso']) {
    header("Location:../login/");
}
include "../conectar.php";
?>

>>>>>>> origin/master:venta/index.php
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Listado de Ventas</title>
<<<<<<< HEAD:venta/ListadoVentas.php
  <?php include '../includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include '../includes/nav.php' ?>
=======
  <?php include '../includes/head.php'?>
</head>
<body class="nav-md">
  <?php include '../includes/nav.php'?>
>>>>>>> origin/master:venta/index.php
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Listado de Ventas</h1>
            <ol class="breadcrumb">
<<<<<<< HEAD:venta/ListadoVentas.php
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
=======
              <li><a href="../home/inicio.php"><i class="fa fa-home"></i> Home</a></li>
>>>>>>> origin/master:venta/index.php
              <li>Ventas</li>
              <li class="active">Listado de Ventas</li>
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
<<<<<<< HEAD:venta/ListadoVentas.php
        </form>
  

 <?php
            if(isset($_GET["action"])){
              if($_GET["action"]== "del"){
                mysqli_query($link,"delete * from venta  where id_venta ='$_GET[id]'");
                echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                       <strong>Exito</strong>
                       Registro eliminado.
                      </div>";
                     }
             }

          if(isset($_GET["q"])){

        $q = $_GET["q"];
        $query = @mysqli_query($link,"SELECT v.id_venta,c.nombre as cliente,c.apellido as apellido,p.nombre as producto, dtv.cantidad as cantidad, 
            dtv.subtotal as subtotal,dtv.total as total,dtv.fecha_venta as fecha_venta FROM venta as v INNER JOIN productos as p 
            ON v.id_producto = p.idproducto INNER JOIN cliente as c 
            ON v.id_cliente= c.idcliente INNER JOIN detalle_venta as dtv 
            ON v.id_venta = dtv.id_venta");
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

            <td>ID Venta</td>
            <td>Nombre</td>
            <td>Apellido</td>
             <td>Producto </td>
            <td>Cantidad</td>
            <td>Subtotal</td>
            <td>Total</td>
            <td>Fecha de Venta</td>
             <td>Acciones</td>

          </tr>";

          while($data = mysqli_fetch_array($query)){

            echo "<tr class=\"warning\">
             <td>$data[0]</td>
             <td>$data[cliente]</td>
             <td>$data[apellido]</td>
             <td>$data[producto]</td>
             <td>$data[cantidad]</td>
             <td>$data[subtotal]</td>
             <td>$data[total]</td>
             <td>$data[fecha_venta]</td>
             <td align='center'>
                 <button type='button' class='btn btn-link' data-toggle='modal' data-target='#DetalleLaboratorio'><img src='../img/detalles.png' border=0 title='Detalles' style='width: 40px; font-size:20px' title='Detalles'></button>
                 </td>

             <td>

              <a href='ModyLaboratorio.php?id=$data[0]'><img src='../img/editar.png' border=0 title='Modificar' style='width: 40px; font-size:20px' title='Modificar'></a>


              <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el usuario $data[0]?q=$q'))
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
=======
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <br>
            <div class="title_left">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                <div class="input-group">
                 <a href="nuevo.php">
                 <button type="button" class="btn btn-dark" style="width: 210px; ">
                      <i class="fa fa-plus-square-o" style="font-size:20px">   Nueva Venta</i>
                  </button>
                 </a>
                </div>
              </div>
            </div>
          <div class="x_content">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
              <th class="column-title">ID</th>
              <th class="column-title">CODIGO INTERNO</th>
              <th class="column-title">CLIENTE</th>
              <th class="column-title">PRODUCTO</th>
              <th class="column-title">CANTIDAD</th>
              <th class="column-title">FECHA DE VENTA</th>
              <th class="column-title">SUBTOTAL</th>
              <th class="column-title">IVA</th>
              <th class="column-title">TOTAL</th>
              <th class="column-title no-link last"><span class="nobr">ACCIÓN</span></th>
            </tr>
          </thead>

          <tbody>
            <tr class="even pointer">
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class=" "></td>
              <td class="" style="text-align: center;">
                <button type="button" class="btn btn-warning" style="width: 40px; font-size:20px" title="Modificar" data-toggle="tooltip" data-placement="left">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-danger" style="width: 40px; font-size:20px" data-toggle="tooltip" data-placement="right" title="Eliminar">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
          </tbody>


        </table>

            </div>
>>>>>>> origin/master:venta/index.php


      </div>
    </div>
  </div>
</div>

</div>
<<<<<<< HEAD:venta/ListadoVentas.php
<?php include '../includes/footer.php' ?>

</div>
</div>
<?php include '../includes/script.php' ?>
=======
<?php include '../includes/footer.php'?>

</div>
</div>
<?php include '../includes/script.php'?>
>>>>>>> origin/master:venta/index.php

</body>
</html>