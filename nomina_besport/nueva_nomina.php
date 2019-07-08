<?php
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";
	$title="Nueva Nómina";

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
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
			<h3><strong>Nueva Nómina</strong></h3>
            </center>
		</div>
		<div class="panel-body">
		<div class="pull-left">
		    <a href="nominas.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Volver</a>
		</div>
		<br>
		<hr>
		<?php
			include("modal/buscar_operaciones.php");
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-2 control-label">No. Empleado</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm text-center" id="nombre_cliente" placeholder="Ingresa No. de Empleado" required>
					  <input id="id_cliente" type='hidden'>
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Empleado</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm text-center" id="tel1" placeholder="Nombre del Empleado" readonly>
                    </div>
					<label for="mail" class="col-md-1 control-label">Puesto</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm text-center" id="mail" placeholder="Puesto" readonly>
							</div>
				 </div>
						<div class="form-group row">
							<label for="tel2" class="col-md-2 control-label">Nomina No.</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm text-center" id="fecha" value="<?php $sql=mysqli_query($con, "select LAST_INSERT_ID(numero_factura) as last from facturas order by numero_factura desc limit 0,1 ");
                                $rws=mysqli_fetch_array($sql);
                                $numero=$rws['last']+1;
                                echo $numero;?>" readonly>
							</div>
<!--
							<label for="estado" class="col-md-1 control-label">Estado</label>
				            <div class="col-md-3">
								<select required class='form-control input-sm ' id="estado_factura" name="estado_factura">
									<option value="1" <?php if ($estado_factura==1){echo "selected";}?>>Pagado</option>
									<option value="2" <?php if ($estado_factura==2){echo "selected";}?>>Pendiente</option>
								</select>
							</div>
-->
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm text-center" id="fecha" value="<?php ini_set("date.timezone", 'America/Mexico_City'); echo date("d/m/Y");?>" readonly>
							</div>
						</div>


				<div class="col-md-12">
					<div class="pull-right">
<!--
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
-->
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-plus"></span> Agregar Operaciones
						</button>
						<button type="submit" class="btn btn-success">
						  <span class="glyphicon glyphicon-saved"></span> Guardar
						</button>
					</div><br><br>
				</div>
			</form>

		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
		</div>
	</div>
		  <div class="row-fluid">
			<div class="col-md-12">




			</div>
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_nomina.js"></script>
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
