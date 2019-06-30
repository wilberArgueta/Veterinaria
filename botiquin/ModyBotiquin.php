<?php include 'conectar.php' ?>

<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Modificar de Botiquín</title>
  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Modificar medicamento de botiquín</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Insumos</li>
              <li>Botiquín</li>
              <li class="active">Modificar medicamento de botiquín</li>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcliente">Preoducto</label>
              <?php
                      include ('conectar.php');
                      $consulta_producto= mysqli_query($link, "SELECT * FROM productos ORDER BY idproducto ASC");
                      echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
                      echo "<select class=\"form-control col-md-7 col-xs-12\" id=\"idproducto\" name=\"idproducto\">";  
                      echo "<option value=''>Seleccione</option>";
                      while ($fila= mysqli_fetch_array($consulta_producto)) {
                        if ($tipo==$fila['idproducto']) {
                        echo "<option value='".$fila['ListadoProductoMedicinal.php']."' selected>".$fila['nombre']."</option>";
                        }
                        echo "<option value='".$fila['idproducto']."'>".$fila['nombre']."</option>";
                      }
                      echo "  </select>";
                      echo "  </div>";
                    ?>
            
              </div>

                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Cantidad</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="cantidad" name="cantidad" title="Cantidad" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" >
                </div>
              </div><br>


                <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="button" style="width: 150px; margin-left: 600px;" class="btn btn-warning">
                  <b>INGRESAR</b>
                </button> 
                </div>
              </div><br><br>


              <table class="table" style="margin-left: 100px; margin-top: -10px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td></td>
                  <td></td>
                  <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
              </tbody>
            </table><br><br>

            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12"></textarea>

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
    <?php include 'includes/footer.php' ?>

    </div>
  </div>
  <?php include 'includes/script.php' ?>

</body>
</html>
