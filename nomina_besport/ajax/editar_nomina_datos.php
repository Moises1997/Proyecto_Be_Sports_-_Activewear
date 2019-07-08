<?php
session_start();
$id_factura= $_SESSION['id_factura'];
$numero_factura= $_SESSION['numero_factura'];
if (isset($_POST['id'])){$id=intval($_POST['id']);}
if (isset($_POST['cantidad'])){$cantidad=intval($_POST['cantidad']);}
if (isset($_POST['precio_venta'])){$precio_venta=floatval($_POST['precio_venta']);}
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	include("../funciones.php");
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=mysqli_query($con, "INSERT INTO detalle_factura (numero_factura, id_producto,cantidad,precio_venta) VALUES ('$numero_factura','$id','$cantidad','$precio_venta')");

}
if (isset($_GET['id']))
{
$id_detalle=intval($_GET['id']);
$delete=mysqli_query($con, "DELETE FROM detalle_factura WHERE id_detalle='".$id_detalle."'");
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<div class="table table-responsive">
<table class="table">
<tr class="label-default">
	<th class='text-left'>No. MODELO</th>
	<th class='text-left'>MODELO</th>
	<th class="text-left">OPERACION</th>
	<th class="text-right">CANT.</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
    $sql=mysqli_query($con, "select * from facturas inner join detalle_factura on facturas.numero_factura=detalle_factura.numero_factura inner join modelo_operacion on detalle_factura.id_producto=modelo_operacion.ID_Modelo_Operacion inner join modelo on modelo_operacion.ID_Modelo=modelo.ID_Modelo inner join operaciones on modelo_operacion.ID_Operacion=operaciones.ID_Operacion where facturas.id_factura='$id_factura'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_detalle=$row["id_detalle"];
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

		?>
		<tr>
			<td class='text-left'><?php echo $codigo_producto;?></td>
			<td class="text-left"><?php echo $nombre_producto;?></td>
			<td class='text-left'><?php echo $nombre_operacion;?></td>
			<td class="text-right"><?php echo $cantidad;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_detalle ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
		<?php
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
	$update=mysqli_query($con,"update facturas set total_venta='$total_factura' where id_factura='$id_factura'");
?>
<tr>
    <td colspan="4"></td>
	<td class='text-right label-success'>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right label-success'><?php echo number_format($total_factura,2);?></td>
	<td class="label-success"></td>
</tr>

</table>
</div>
