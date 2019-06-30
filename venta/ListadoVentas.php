<!DOCTYPE html>
<html>
<head>
  <title> | Clinica Veterinaria | Listado de Ventas</title>
  <?php include 'includes/head.php' ?>
</head>
<body class="nav-md">
  <?php include 'includes/nav.php' ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <section class="content-header">
            <h1>Listado de Ventas</h1>
            <ol class="breadcrumb">
              <li><a href="inicio.php"><i class="fa fa-home"></i> Home</a></li>
              <li>Ventas</li>
              <li class="active">Listado de Ventas</li>
            </ol>
          </section>
        </div>
      </div>
    </div>

    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar...">
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
    
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <br>
            <div class="title_left">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                <div class="input-group">
                  <button type="button" class="btn btn-dark" style="width: 210px; ">
                      <i class="fa fa-plus-square-o" style="font-size:20px">   Nueva Venta</i>
                  </button>                
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