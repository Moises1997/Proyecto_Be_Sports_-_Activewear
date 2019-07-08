<style>
    table tr th {
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background: red;
    }

    .sorting {
        background-color: #D4D4D4;
    }

    .asc:after {
        content: ' ↑';
    }

    .desc:after {
        content: " ↓";
    }
</style>

<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_factura=intval($_GET['id']);
		$del1="delete from facturas where numero_factura='".$numero_factura."'";
		$del2="delete from detalle_factura where numero_factura='".$numero_factura."'";
		if ($delete1=mysqli_query($con,$del1) and $delete2=mysqli_query($con,$del2)){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php

		}
	}
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "facturas, usuarios";
		 $sWhere = "";
		 $sWhere.=" WHERE facturas.id_cliente=usuarios.ID_Usuario";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and  (usuarios.Nombre_usuario like '%$q%' or facturas.id_factura like '%$q%' or facturas.estado_factura like '%$q%')";

		}

		$sWhere.=" order by facturas.id_factura desc";
		include 'pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './nominas.php';
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table table-responsive">
			  <table class="table table-bordered" id="datos">
				<tr  class="info">
					<th class="text-center">Nómina No.</th>
					<th class="text-left">Cliente</th>
					<th class='text-center'>Estado</th>
					<th class='text-right'>Total</th>
					<th class='text-right'>Fecha</th>
					<th class='text-center'>Acciones</th>

				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_factura=$row['id_factura'];
						$numero_factura=$row['numero_factura'];
						$fecha=date("d/m/Y", strtotime($row['fecha_factura']));
                        $codigo_cliente=$row['Codigo_usuario'];
						$nombre_cliente=$row['Nombre_usuario']." ".$row['Apellido_paterno']." ".$row['Apellido_materno'];
						$telefono_cliente=$row['Nombre_usuario']." ".$row['Apellido_paterno']." ".$row['Apellido_materno'];
						$email_cliente=$row['Puesto'];
						$estado_factura=$row['estado_factura'];
						if ($estado_factura==1){$text_estado="Pagada";$label_class='label-success';}
						else{$text_estado="Pendiente";$label_class='label-warning';}
						$total_venta=$row['total_venta'];
					?>
					<tr>
						<td class="text-center"><?php echo $numero_factura; ?></td>
                        <td class="text-left"><a style="text-decoration:none; color:#000;" href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-asterisk'></i> <?php echo $codigo_cliente?><br> <i class='glyphicon glyphicon-user'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-briefcase'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<td class="text-center"><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
						<td class='text-right'><?php echo number_format ($total_venta,2); ?></td>
                       <td class="text-right"><?php echo $fecha; ?></td>
                        <td class="text-center">
                            <a href="editar_nomina.php?id_factura=<?php echo $id_factura;?>" class='btn btn-warning' title='Editar Nómina' ><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="#" class='btn btn-success' title='Descargar Nómina' onclick="imprimir_factura('<?php echo $id_factura;?>');"><i class="glyphicon glyphicon-download"></i></a>
                            <a href="#" class='btn btn-danger' title='Borrar Nómina' onclick="eliminar('<?php echo $numero_factura; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>

					</tr>
					<?php
				}
				?>
			  </table>
			  <tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			</div>
			<?php
		}
	}
?>


<script>
    $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }
</script>
