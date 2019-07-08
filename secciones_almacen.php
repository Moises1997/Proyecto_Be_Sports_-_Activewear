<?php
include "templates/header.php";
include "usuarios/conn.php";
?>
<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if($_SESSION["Privilegio"] == 3){
        header("location:menu_confeccion.php");
    }else{
        if ($_SESSION["Privilegio"] == 4){
            header("location: menu_terminado.php");
        }else{
            if ($_SESSION["Privilegio"] == 2){
                header("location: menu_corte.php");
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
                            }else{
                                if ($_SESSION["Privilegio"] == 10){
                                header("location: menu_vendedor.php");
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



<script src="usuarios/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="usuarios/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script language="JavaScript">
      function pregunta(e){
          if (confirm('¿Estas seguro de que deseas eliminar esta sección?.')){
              document.borraregistros.submit()
          }else{
              e.preventDefault();
          }
      }
</script>
</head>
<main role="main" class="flex-shrink-0">
<body>
<br>
    <div class="container">
        <?php
        if(isset($_GET['action']) == 'delete'){
            $id_delete = intval($_GET['ID_Seccion']);
            $query = mysqli_query($conn, "SELECT * FROM seccion_almacen WHERE ID_Seccion='$id_delete'");
            if(mysqli_num_rows($query) == 0){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            }else{
                $delete = mysqli_query($conn, "DELETE FROM seccion_almacen WHERE ID_Seccion='$id_delete'");
                if($delete){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
        }
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"></i>Secciones del Inventario de Almacén</h3>
			</div>
			<div class="panel-body">
               <div class="pull-left">
                   <a href="menu_corte.php" class="btn btn-sm btn-success"><span class="icon icon-home"></span><br>Menú Principal</a>
               </div>
                <div class="pull-right">
                    <a href="registro-secciones-almacen.php" class="btn btn-sm btn-primary"><span class="icon icon-plus"></span><br>Nueva Sección</a>
                </div><br><br>
                <hr>
                <table id="lookup" class="table table-bordered table-hover">
                    <thead bgcolor="#eeeeee" align="center">
                    <tr>
                        <th style="text-align: center;">Nombre Seccion</th>
                        <th style="text-align: center;">Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="usuarios/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="usuarios/datatables/jquery.dataTables.js"></script>
    <script src="usuarios/datatables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
            var dataTable = $('#lookup').DataTable( {

             "language":	{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },

                "processing": true,
                "serverSide": true,
                "ajax":{
                    url :"ajax-grid-data-secciones-almacen.php", // json datasource
                    type: "post",  // method  , by default get
                    error: function(){  // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos</th></tr></tbody>');
                        $("#lookup_processing").css("display","none");

                    }
                }
            } );
        } );
    </script>
    </body>
</main>
