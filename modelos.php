<?php
include "templates/header.php";
include "usuarios/conn.php";
?>
<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["Privilegio"] == 2) {
        header("location:menu_corte.php");
    }else{
        if($_SESSION["Privilegio"] == 3){
            header("location:menu_confeccion.php");
        }else{
            if ($_SESSION["Privilegio"] == 4){
                header("location: menu_terminado.php");
            }else{
                if ($_SESSION["Privilegio"] == 5){
                    header("location: menu_almacen.php");
                }else{
                    if ($_SESSION["Privilegio"] == 6){
                        header("location: menu_empleados.php");
                    }else{
                        if ($_SESSION["Privilegio"] == 7){
                            header("location: menu_empleados.php");
                        }else{
                            if ($_SESSION["Privilegio"] == 8){
                                header("location: menu_empleados.php");
                            }else{
                                if ($_SESSION["Privilegio"] == 9){
                                    header("location: menu_empleados.php");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

<link rel="stylesheet" href="usuarios/datatables/dataTables.bootstrap.css"/>
<link type="text/css" href="usuarios/css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="usuarios/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link type="text/css" href="usuarios/css/theme.css" rel="stylesheet">
<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'    rel='stylesheet'>


<script src="js/FancyZoom/js-global/FancyZoom.js" type="text/javascript"></script>
<script src="js/FancyZoom/js-global/FancyZoomHTML.js" type="text/javascript"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://datoweb.com/visor/js/fresco/fresco.js"></script>
<link rel="stylesheet" type="text/css" href="https://datoweb.com/visor/css/fresco/fresco.css" />


<script src="usuarios/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="usuarios/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script language="JavaScript">
      function pregunta(e){
          if (confirm('¿Estas seguro de que deseas eliminar este modelo?.')){
              document.borraregistros.submit()
          }else{
              e.preventDefault();
          }
      }
</script>
</head>
<body>
<br>
    <div class="container" style="max-width: 90%;">
    <?php
    require_once 'dbconfig.php';

    if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Imagen FROM modelo WHERE ID_Modelo =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("imagen/modelos/".$imgRow['Imagen']);
            $stmt_delete = $DB_con->prepare('DELETE FROM modelo WHERE ID_Modelo =:uid');
            $stmt_delete->bindParam(':uid',$_GET['delete_id']);
            $stmt_delete->execute();
            if($stmt_delete){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
            }
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"></i> Modelos</h3>
			</div>
			<div class="panel-body">
                <div class="pull-left">
                    <a href="menu_administrador.php" class="btn btn-sm btn-success" title="regresar al menu principal"><span class="icon icon-home"></span><br>Menu Principal</a>
                </div>
                <div class="pull-right">
				    <a href="registro-modelo.php" class="btn btn-sm btn-primary" title="agregar un nuevo modelo"><span class="icon icon-plus" st></span><br>Nuevo Modelo</a>
                </div><br><br>
                <hr>
                <div class="" style="overflow-y:scroll;">
                    <table class="table table-hover table-bordered" id="dtBasicExample">
                        <thead>
                            <tr>
                                <th class="text-center">No. Modelo</th>
                                <th class="text-center">Nombre Modelo</th>
                                <th class="text-center">Caracteristicas</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                    <tbody id="developers">
                        <?php
                        $sql_query = "SELECT * FROM modelo";
                        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                        while( $developer = mysqli_fetch_assoc($resultset) ) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $developer ['No_modelo']; ?></td>
                            <td class="text-center"><?php echo $developer ['Nombre_modelo']; ?></td>
                            <td class="text-center"><?php echo $developer ['Caracteristicas']; ?></td>
                            <td><a href="imagen/modelos/<?php echo $developer["Imagen"]?>"><img src="imagen/modelos/<?php echo $developer['Imagen'];?>" alt="" width="50px" height="50px"></a></td>
                            <td class="text-center"><?php echo date("d/m/Y", strtotime($developer["Fecha"])); ?></td>
                            <td><a href="editar_modelo.php?ID_Modelo=<?php echo $developer['ID_Modelo']?>" title="Editar" class="btn btn-info"><i class="icon icon-pencil"></i></a>
                            <a href="?delete_id=<?php echo $developer['ID_Modelo'];?>" class="btn btn-danger" title="Eliminar" onclick="pregunta(event)"><i class="icon icon-trash"></i></a>
                            </td>
                        </tr
                        <?php } ?>
                    </tbody>
                    </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <ul class="pagination pagination-lg pager" id="developer_page"></ul>
                    </div>
            </div>
        </div>
    </div>

        <script src="usuarios/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="usuarios/datatables/jquery.dataTables.js"></script>
        <script src="usuarios/datatables/dataTables.bootstrap.js"></script>
        <script src="js/pagination.js"></script>
        <script>
            $(document).ready(function () {
              $('#dtBasicExample').DataTable({
                "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
              });
              $('.dataTables_length').addClass('bs-select');
            });
        </script>
    </body>
</html>
