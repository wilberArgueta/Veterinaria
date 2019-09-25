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
  <title> | Clinica Veterinaria | Registro de Venta</title>
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
            <h1>Nueva Venta</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Ventas</li>
              <li class="active">Nueva Venta</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registroventa" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos de la Venta</h1>
              </section>


              <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_ingreso0">Fecha de Venta</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepicker2'>
                                  <input type='date' class="form-control" name="fecha" id="fecha" />
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>
                            </div><br>


                <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Numero</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="numero" name="numero" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div><br>



                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Cliente</label>

                    <?php
                      include ('../conectar.php');
                      $consulta_cliente= mysqli_query($link, "SELECT * FROM cliente");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control js-example-basic-single col-md-6 col-xs-12\" id=\"idcliente\" name=\"idcliente\">";  
                      echo "<option value=''>Seleccione</option>";
                      while ($fila= mysqli_fetch_array($consulta_cliente)) {
                        if ($tipo==$fila['idcliente']) {
                        echo "<option value='".$fila['idcliente']."' selected>".$fila['nombre'].$fila['apellido']."</option>";
                        }
                        echo "<option value='".$fila['idcliente']."'>".$fila['nombre'].$fila['apellido']."</option>";
                      }
                      echo "  </select>";
                      echo "  </div>";
                    ?>

                    <a href="../cliente/NuevoCliente.php">
                      <button type="button" class="btn btn-secondary" title="Agregar Cliente">
                        <i class="fa fa-plus"></i>
                      </button> 
                    </a>
                </div><br>
              

            

              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="button" style="width: 150px; margin-left: 600px;" class="btn btn-warning" data-toggle='modal' data-target='#productos'>
                  <b>INGRESAR</b>
                </button> 
                </div>
              </div>
<br>

            <hr>

            <table class="table" id="tablaProducto" style="margin-left: 100px; margin-top: -20px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio unit</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              
            </table><br>
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="suma">Suma</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="suma" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="suma"  required="required" type="text">
                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
              </div>
            </div>

            

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subtotal">Subtotal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="subtotal" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="subtotal"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
        

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iva">% IVA</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="iva" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="iva"  required="required" type="text">
                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
              </div>
               </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total">Total</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="total" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="total"  required="required" type="text">
                  <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
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
    <?php include '../includes/footer.php' ?>

    </div>
  </div>
  <?php include '../includes/script.php' ?>

</body>
</html>



<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#2A3F54;; color:#fdfefe">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center"  id="myModalLabel">Seleccionar los Productos </h4>
      </div><!--Fin del header-->

      <div class="modal-body" id="productosModal">
    <div class="panel">
    <table class="display" id="tabla">
    <thead>
      <tr>
  
        <th>Código</th>
        <th>Poductos</th>
        <th>Descripcion</th>
      
        <th>Existencia</th>
        <th>Agregar</th>
      </tr>
    </thead>

    <tbody>
     <?php 

     include '../conectar.php';

     $query= mysqli_query($link, "SELECT p.idproducto, p.cod_interno as cod_interno, p.nombre as producto, p.descripcion as descripcion, p.cantidad as cantidad,c.nombre
      AS categoria, pv.nombre as proveedor, st.idStock_movimiento as idStock_movimiento,dt.presentacion as presentacion,dt.valor as valor, dt.precio_compra 
      as precio_compra, dt.precio_venta as precio_venta, dt.fecha_vencimiento as fecha_vencimiento FROM productos as p INNER JOIN categoria as c
       ON(p.idcategoria=c.idcategoria) INNER JOIN stock_movimiento as st ON (p.idproducto =st.idproducto) INNER JOIN proveedor as pv ON (st.idproveedor= pv.idproveedor )
       INNER JOIN detalle_producto as dt ON (dt.idStock_movimiento=st.idStock_movimiento)");

     
      while($data = mysqli_fetch_array($query)){
       

     echo " 
<tr>

  <td>$data[cod_interno]</td>
  <td>$data[producto]</td>
  <td>$data[descripcion]</td>
  
  <td>$data[cantidad]</td>
  <td><button type=\"button\" class=\"agregarProducto btn btn-success glyphicon glyphicon-plus-sign\" value=\" <tr><td>$data[cod_interno]</td>
                                            <td> $data[producto]</td>
                                            <td> <input type='text' class='form-control col-md-3 ' value=1 name='cantidad[]'> </td>
                                            <td> <input type='hidden' class='form-control' value='' name='idProductos[]'></td>
                                           <td> $data[precio_venta]</td>
                                            <td> </td>
                                            <td> <button type='button' class='btn btn-danger' >Eliminar</button></td>
                                            
                                            </tr>\"></button>



</td>
</tr>

";
}?>
    </tbody>
      
    </table>


      <div class="text-center col-md-12">
      <p><p>
        <a class="btn btn-danger btn-lg" href="">Cancelar</a>
      </div><hr>
    </div>
    </div>

      </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tabla').DataTable();

    $('.agregarProducto').click(function() {
        fila = $(this).val();
        $("#tablaProducto").append(fila);
        $(this).fadeOut();
    });


} );
</script>

<?php
if (isset($_POST['submit'])) {
  $carnet = $_POST["carnet"];
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $producto=$_POST['idProductos'];
  $cantidad=$_POST['cantidad'];
  
  $sql_comprueba_botiquin = "SELECT nombre FROM botiquin where nombre='$nombre'";
  $ejecuta_sql_botiquin = mysqli_query($link, $sql_comprueba_botiquin);
  $comprueba_botiquin = mysqli_num_rows($ejecuta_sql_botiquin);
  try {
    if ($comprueba_botiquin == 0) {
      $query = "INSERT INTO botiquin (cod_estudiante,nombre_estudiante,descripcion)
      values('$carnet','$nombre','$descripcion')";
      
      $insertar = mysqli_query($link, $query);
      if ($insertar) {

    $query1= "SELECT MAX(id_botiquin) AS id FROM botiquin WHERE nombre_estudiante= '$nombre'";
     $datos = @mysqli_query($link, $query1);
     while($data = mysqli_fetch_array($datos)){
       $id_botiquin=$data['id'];
     }

    

      $contador=0;
     for ($i=0; $i < sizeof($producto); $i++) { 

       
       $consulta= "INSERT INTO detalle_botiquin (idproducto,cantidad,idbotiquin) VALUES ('$producto[$i]','$cantidad[$i]','$id_botiquin')";
        $insertar = mysqli_query($link, $consulta);
        if ($insertar) {
          $contador++;
        }
            }

            if ($contador==sizeof($producto))
            {
              

        echo "<script>
              swal(
              'Exito...',
              'Datos insertados con exito!',
              'success'
            )
              location.replace('../botiquin/ListadoBotiquin.php?q=$nombre&info=add');
              </script>";
        }
      } else {
        echo "<script>
        swal(
        'Oops...',
        'Error al insertar!',
        'error'
      )</script>";
    }
  } else {
    echo "<script>
    swal(
    'Oops...',
    'El registro ya existe!',
    'error'
  )</script>";
  mysqli_close($link);
}
} catch (\Throwable $th) {
  echo $th->getMessage();
}
}

?>