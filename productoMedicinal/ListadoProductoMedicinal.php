<?php include 'conectar.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Listado de Productos Medicinales</title>
  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Listado de Productos Medicinales</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Producto Medicinal</li>
              <li class="active">Listado de Productos Medicinales</li>
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
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search ">
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
                  <a href="NuevoProductoMedicinal.php">
                    <button type="button" class="btn btn-dark" style="width: 300px; ">
                      <i class="fa fa-plus-square-o" style="font-size:20px">  Nuevo Producto Medicinal</i>
                    </button>
                  </a>
                </div>
              </div>
            </div><br><br><br>
  

                 <?php
                 if(isset($_GET["action"])){
            	      if($_GET["action"]== "del"){
                  		mysqli_query($link,"delete from productos where id_producto ='$_GET[id]'");
                  		echo "<br><div class=\"alert alert alert-info\" role=\"alert\">
                  		       <strong>Exito</strong>
                  		       Registro eliminado.
                  		      </div>";
            	             }
                  }

               if(isset($_GET["q"])){

            	$q = $_GET["q"];
            	$query = @mysqli_query($link,"SELECT p.id_producto as id_producto, p.codigo_interno as codigo_interno, p.nombre as nombreP, p.descripcion as descripcion, p.unidades_disponible as unidades_disponible, p.porcentaje_ganancia as porcentaje_ganancia, c.nombre AS Categoria, pv.nombre as Proveedor,
              dt.fecha_vencimiento as fecha_vencimiento, dt.precio_venta as precio_venta, dt.precio_compra as precio_compra
              FROM productos  as p INNER JOIN categoria as c ON(p.id_categoria=c.id_categoria) INNER JOIN proveedor as pv
              ON(p.id_proveedor=pv.id_proveedor) INNER JOIN detalle_producto as dt ON(p.id_producto = dt.id_producto)
              WHERE p.nombre LIKE '%$q%' OR p.codigo_interno LIKE '%$q%' order by p.nombre");

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

            			<td>ID productos</td>
            			<td>Cod.Interno</td>
            			<td>Nombre</td>
                  <td>Descripción</td>
            			<td>Unidades</td>
            			<td>% Ganancia</td>
            			<td>Categoria</td>
                  <td>Proveedor</td>
                  <td>Fecha Vencimiento</td>
                  <td>Precio Venta</td>
                  <td>Precio Compra</td>
                  <td>Acciones</td>

            		</tr>";

            		while($data = mysqli_fetch_array($query)){

            			echo "<tr class=\"warning\">
                  <td> $data[0]</td>
                  <td>$data[codigo_interno]</td>
                  <td>$data[nombreP]</td>
                  <td>$data[descripcion]</td>
                  <td>$data[unidades_disponible]</td>
                  <td>$data[porcentaje_ganancia]</td>
                  <td>$data[Categoria]</td>
                  <td>$data[Proveedor]</td>
                  <td>$data[fecha_vencimiento]</td>
                  <td>$data[precio_venta]</td>
                  <td>$data[precio_compra]</td>

                  <td>

                    <a href='ModyProductoMedicinal.php?id=$data[0]'><img src='img/editar.png' border=0 title='Modificar' style='width: 30px; font-size:20px' title='Modificar'></a>


                    <a href=# onclick=\"javascript:if(window.confirm('¿Desea eliminar el usuario $data[0]?q=$q'))
                    {location.replace('$_SERVER[PHP_SELF]?action=del&id=$data[0]&q=$q')}\">
                    <img src='img/eliminar.png' border=0 title='Eliminar' style='width: 30px; font-size:20px' title='Eliminar'></a>

            </td>

            			</tr>	";
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

            <?php include 'includes/footer.php' ?>


            <?php include 'includes/script.php' ?>

            </body>
            </html>
