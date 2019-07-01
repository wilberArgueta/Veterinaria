
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
  <title> | Clinica Veterinaria | Registro de Botiquín</title>
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
            <h1>Nuevo medicamento de botiquín</h1>
            <ol class="breadcrumb">
              <li><a href="../home/"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Botiquín</li>
              <li class="active">Nuevo medicamento de botiquín</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <form method="post" role="form" id= "frm_registrobotiquin" class="form-horizontal form-label-left" novalidate>
               <section class="content-header">
                <h1>Datos del medicamento</h1>
              </section>
              <br><br>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carnet" >Cárnet</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="carnet" class="form-control col-md-7 col-xs-12" name="carnet" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
              </div>
                
               <div class="item form-group"> 
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
                </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker2'>
                      <input type='date' name="fecha" id="fecha" class="form-control" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                  </div>

              </div>

            

                <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="button" style="width: 150px; margin-left: 600px;" class="btn btn-warning" data-toggle='modal' data-target='#productos'>
                  <b>INGRESAR</b>
                </button> 
                </div> 



              </div><br><br>


              <table id="tablaBotiquin" class="table" style="margin-left: 100px; margin-top: -10px;">
             
                <thead class='thead-dark'><tr>
                  <th scope='col'>Código</th>
                  <th scope='col'>Producto</th>
                  <th scope='col'>Descripcion</th>
                  <th scope='col'>Cantidad</th>
                  <th scope='col'>Acción</th>
                  </tr></thead>
           
              
            </table><br>


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
        <h4 class="modal-title text-center"  id="myModalLabel">Seleccionar los Productos Medicinales</h4>
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

     $query= mysqli_query($link, "SELECT p.idproducto as id, p.cod_interno as cod_interno, p.nombre as producto, p.descripcion as descripcion, p.cantidad as cantidad,c.nombre AS categoria
      FROM productos  as p INNER JOIN categoria as c ON(p.idcategoria=c.idcategoria) where p.idcategoria=4");

     
      while($data = mysqli_fetch_array($query)){
       

     echo " 
<tr>

  <td>$data[cod_interno]</td>
  <td>$data[producto]</td>
  <td>$data[descripcion]</td>
  <td>$data[cantidad]</td>
  <td><button type=\"button\" class=\"agregarProducto btn btn-success glyphicon glyphicon-plus-sign\" value=\" <tr><td>$data[cod_interno]</td>
                                            <td> $data[producto]</td>
                                            <td> $data[producto]</td>
                                            <td> <input type='text' class='form-control col-md-3 ' value=1 name='cantidad[]'> </td>
                                            <td> <input type='hidden' class='form-control' value='' name='idProductos[]'></td>
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
        $("#tablaBotiquin").append(fila);
        $(this).fadeOut();
    });


} );
</script>