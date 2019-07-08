<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;

}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    <?php echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
	<?php include("encabezado_nomina.php");?>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:45%;" class='midnight-blue'>NÓMINA DE</td>
           <td style="width:25%;" class='midnight-white'></td>
           <td style="width:20%;" class='midnight-blue'>FECHA</td>
           <td style="width:5%;" class='midnight-white'></td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php
				$sql_cliente=mysqli_query($con,"select * from usuarios where ID_Usuario='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
                echo "Codigo: ";
				echo $rw_cliente['Codigo_usuario'];
				echo "<br> Nombre: ";
				echo $rw_cliente['Nombre_usuario']." ". $rw_cliente['Apellido_paterno']." ". $rw_cliente['Apellido_materno'];
				echo "<br> Puesto: ";
				echo $rw_cliente['Puesto'];
			?>

		   </td>
           <td style="width:25%;"></td>
            <td style="width:25%; text-align: right;"><?php ini_set("date.timezone", 'America/Mexico_City'); echo date("d/m/Y", strtotime($fecha_factura));?></td>
            <td style="width:15%;"></td>
        </tr>
    </table>
	<br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 15%;" class='midnight-blue'>NO. MODELO</th>
            <th style="width: 25%" class='midnight-blue'>MODELO</th>
            <th style="width: 30%" class='midnight-blue'>OPERACION</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>CANT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>

        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from modelo, detalle_factura, facturas, modelo_operacion, operaciones where modelo_operacion.ID_Modelo_Operacion=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and modelo_operacion.ID_Modelo=modelo.ID_Modelo and modelo_operacion.ID_Operacion=operaciones.ID_Operacion and facturas.id_factura='".$id_factura."' order by No_modelo asc");

while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['No_modelo'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['Nombre_modelo'];
    $nombre_operacion=$row['Nombre_operacion'];

	$precio_venta=$row['precio_venta'];
	$precio_venta_f=number_format($precio_venta,2);
	$precio_venta_r=str_replace(",","",$precio_venta_f);
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);
	$precio_total_r=str_replace(",","",$precio_total_f);
	$sumador_total+=$precio_total_r;
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: LEFT"><?php echo $codigo_producto; ?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 30%; text-align: left"><?php echo $nombre_operacion;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_total_f;?></td>

        </tr>

	<?php


	$nums++;
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
?>
        <tr>
          <br>
           <td colspan="4"></td>
            <td style="widtd: 85%; text-align: right; background:green;">TOTAL <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right; background:green;"> <?php echo number_format($total_factura,2);?></td>
        </tr>
    </table>
</page>

