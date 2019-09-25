<style type="text/css">
<!--
table.page_header {width: 100%;     border: none; background-color: #FFFFFF; text-align:right;font-family:helvetica,serif;}
table.page_footer {width: 100%; border: none; background-color: #A9A9A9;  padding: 2mm;color:#FFFFFF; font-family:helvetica,serif; font-weight:bold;}
div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
ul.main { width: 95%; list-style-type: square; }
ul.main li { padding-bottom: 2mm; }
h1 { text-align: center; font-size: 20mm}
h3 { text-align:right; font-size: 14px; color:#000080}
table { vertical-align: middle; }
tr    { vertical-align: middle; }
p {margin: 0px 5px 0px 5px;}
span {margin: 5px;}
img { border: 1px #000000;}
-->

</style>
<page backtop="30mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt" backimgx="center" backimgy="bottom" backimgw="100%">
    <page_header>

    <table class="page_header" >
       <tr>
                  <td align=right style="width: 10%; color: #444444;" >
                      <img style="width: 10%;" src="../img/logo2.jpg">
                  </td>
                </tr>
                <tr>
                  <td align=center style="width:95%; "><b>UNIVERSIDAD DE ORIENTE</b></td>
                </tr><br>
                <tr>
                  <td align=center style="width:95%; "><b>FACULTAD DE CIENCIAS AGRÓNOMICAS</b></td>
                </tr><br>
                <tr>
                  <td align=center style="width:95%; "><b>REPORTE DE PRODUCTO MEDICINAL</b></td>
                </tr><br>
                
                <tr>
                  <td align=center style="width:80%; "><b>FECHA DE IMPRESION:</b> <?php echo date("d-m-Y H:i:s");?></td>
                </tr><br>


  </table>
  </page_header>
  <page_footer>
  <table class="page_footer">

    <tr>
        <td style="width: 40%; text-align: left;">
            Empresa nombre
        </td>
        <td style="width: 30%; text-align: center">
            P&aacute;gina [[page_cu]]/[[page_nb]]
        </td>
        <td style="width: 30%; text-align: right;">
            Tel: xxxxx-xx
        </td>
    </tr>
</table>
</page_footer>


<br>
<table align="center" cellspacing="1" style="width: 100%; border: solid 1px black; background: #A9A9A9; text-align: center; font-size: 11pt; color:#FFFFFF; font-family:helvetica,serif;">
    <tr>
        <th style="width:5%">N&deg;</th>
        <th style="width: 5%">Codigo</th>
        <th style="width: 15%">Producto</th>
        <th style="width: 15%">Descripcion</th>
        <th style="width: 10%">categoria</th>
        <th style="width: 10%">Cantidad</th>
        <th style="width: 10%">Proveedor</th>
        <th style="width: 10%">Presentacion</th>
        <th style="width: 5%">(ml)</th>
        <th style="width: 5%">Precio</th>
        <th style="width: 10%">Fecha Vencimiento</th>


    </tr>
</table>

<?php
include('../conectar.php');
$sql= "SELECT p.cod_interno as cod_interno,p.nombre as producto,p.descripcion as descripcion,c.nombre as categoria,p.cantidad as cantidad,pv.nombre as proveedor,dt.presentacion as presentacion,dt.valor as valor,dt.precio_venta as precio_venta ,dt.fecha_vencimiento as fecha_vencimiento FROM  productos as p  INNER JOIN categoria as c ON (p.idcategoria=c.idcategoria) INNER JOIN stock_movimiento AS st ON (st.idproducto =p.idproducto) INNER JOIN proveedor as pv ON (st.idproveedor=pv.idproveedor) INNER JOIN detalle_producto AS dt ON (st.idStock_movimiento =dt.idStock_movimiento)";

$query=mysqli_query($link, $sql);

$i=1;
while ($row = mysqli_fetch_array($query)) {
    ?>
    <table border="0.5px" align="center" cellspacing="0"  style="width: 100%; border:none; text-align: center; font-size: 11pt; color:#000; font-family:helvetica,serif;">

        <tr>
            <td style="width:5%"><?php echo $i; ?></td>
            <td style="width:5%"><?php echo $row['cod_interno']; ?></td>
            <td style="width:15%"><?php echo utf8_decode($row['producto']); ?></td>
            <td style="width:15%"><?php echo utf8_decode($row['descripcion']); ?></td>
            <td style="width:10%"><?php echo utf8_decode($row['categoria']); ?></td>
            <td style="width:10%"><?php echo utf8_decode($row['cantidad']); ?></td>
            <td style="width:10%"><?php echo utf8_decode($row['proveedor']); ?></td>
            <td style="width:10%"><?php echo utf8_decode($row['presentacion']); ?></td>
            <td style="width:5%"><?php echo utf8_decode($row['valor']); ?></td>
            <td style="width:5%"><?php echo utf8_decode($row['precio_venta']); ?></td>
            <td style="width:10%"><?php echo utf8_decode($row['fecha_vencimiento']); ?></td>


        </tr>
    </table>
    <?php
    $i++;
}
?>


</page>