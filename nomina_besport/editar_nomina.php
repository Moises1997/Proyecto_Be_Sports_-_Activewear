<?php
session_start();
$active_facturas="active";
$active_productos="";
$active_clientes="";
$active_usuarios="";
$title="Editar Nómina";

/* Connect To Database*/
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

if (isset($_GET['id_factura']))
{
$id_factura=intval($_GET['id_factura']);
$campos="usuarios.ID_Usuario, usuarios.Nombre_usuario, usuarios.Apellido_paterno, usuarios.Apellido_materno, usuarios.Codigo_usuario, usuarios.Puesto, facturas.id_cliente, facturas.fecha_factura, facturas.condiciones, facturas.estado_factura, facturas.numero_factura";
$sql_factura=mysqli_query($con,"select $campos from facturas, usuarios where facturas.id_cliente=usuarios.ID_Usuario and id_factura='".$id_factura."'");
$count=mysqli_num_rows($sql_factura);
if ($count==1)
{
$rw_factura=mysqli_fetch_array($sql_factura);
$id_cliente=$rw_factura['ID_Usuario'];
$nombre_cliente=$rw_factura['Codigo_usuario'];
$telefono_cliente=$rw_factura['Nombre_usuario']." ".$rw_factura['Apellido_paterno']." ".$rw_factura['Apellido_materno'];
$email_cliente=$rw_factura['Puesto'];
$fecha_factura=date("d/m/Y", strtotime($rw_factura['fecha_factura']));
$condiciones=$rw_factura['condiciones'];
$estado_factura=$rw_factura['estado_factura'];
$numero_factura=$rw_factura['numero_factura'];
$_SESSION['id_factura']=$id_factura;
$_SESSION['numero_factura']=$numero_factura;
}
else
{
header("location: nominas.php");
exit;
}
}
else
{
header("location: nominas.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php");?>
</head>
<body>
<br>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
<center>
<h3><strong>Editar Nómina</strong></h3>
</center>
</div>
<div class="panel-body">
<div class="pull-left">
<a href="nominas.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Volver</a>
</div><br>
<hr>
<?php
include("modal/buscar_operaciones.php");
?>
<form class="form-horizontal" role="form" id="datos_factura">
<div class="form-group row">
<label for="nombre_cliente" class="col-md-2 control-label">No. Empleado</label>
<div class="col-md-2">
<input type="text" class="form-control input-sm text-center" id="nombre_cliente" placeholder="No. de Empleado" required value="<?php echo $nombre_cliente;?>">
<input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente;?>">
</div>
<label for="tel1" class="col-md-1 control-label">Empleado</label>
<div class="col-md-3">
<input type="text" class="form-control input-sm text-center" id="tel1" placeholder="Nombre del Empleado" value="<?php echo $telefono_cliente;?>" readonly>
</div>
<label for="mail" class="col-md-1 control-label">Puesto</label>
<div class="col-md-2">
<input type="text" class="form-control input-sm text-center" id="mail" placeholder="Puesto" readonly value="<?php echo $email_cliente;?>">
</div>
</div>
<div class="form-group row">
<label for="tel2" class="col-md-2 control-label">No. Nómina</label>
<div class="col-md-2">
<input type="text" class="form-control input-sm text-center" id="fecha" value="<?php echo $numero_factura;?>" readonly>
</div>
<label for="tel2" class="col-md-1 control-label">Fecha</label>
<div class="col-md-3">
<input type="text" class="form-control input-sm text-center" id="fecha" value="<?php ini_set("date.timezone", 'America/Mexico_City'); echo $fecha_factura;?>" readonly>
</div>
<label for="tel2" class="col-md-1 control-label">Estado</label>
<div class="col-md-2">
<select class='form-control input-sm ' id="estado_factura" name="estado_factura">
<option value="1" <?php if ($estado_factura==1){echo "selected";}?>>Pagado</option>
<option value="2" <?php if ($estado_factura==2){echo "selected";}?>>Pendiente</option>
</select>
</div>
</div>


<div class="col-md-12">
<div class="pull-right">
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-refresh"></span> Actualizar datos
</button>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
<span class="glyphicon glyphicon-plus"></span> Agregar operaciones
</button>
<button type="button" class="btn btn-info" onclick="imprimir_factura('<?php echo $id_factura;?>')">
<span class="glyphicon glyphicon-print"></span> Imprimir
</button>
</div>
</div>
</form>
<div class="clearfix"></div>
<div class="editar_factura" class='col-md-12' style="margin-top:10px"></div>

<div id="resultados" class='col-md-12' style="margin-top:10px"></div><

</div>
</div>

</div>
<hr>
<?php
include("footer.php");
?>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/editar_nomina.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
$("#nombre_cliente").autocomplete({
source: "./ajax/autocomplete/usuarios.php",
minLength: 1,
select: function(event, ui) {
event.preventDefault();
$('#id_cliente').val(ui.item.ID_Usuario);
$('#nombre_cliente').val(ui.item.Codigo_usuario);
$('#tel1').val(ui.item.Nombre_usuario);
$('#mail').val(ui.item.Puesto);


}
});


});

$("#nombre_cliente" ).on( "keydown", function( event ) {
if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
{
$("#id_cliente" ).val("");
$("#tel1" ).val("");
$("#mail" ).val("");

}
if (event.keyCode==$.ui.keyCode.DELETE){
$("#nombre_cliente" ).val("");
$("#id_cliente" ).val("");
$("#tel1" ).val("");
$("#mail" ).val("");
}
});
</script>

</body>
</html>
