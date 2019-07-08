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
            if ($_SESSION["Privilegio"] == 5){
                header("location: menu_almacen.php");
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
          if (confirm('¿Estas seguro de que deseas eliminar este rollo de tela?.')){
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                <h3 class="panel-title">Inventario Telas</h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="pull-left">
                    <a href="menu_administrador.php" class="btn btn-success" title="regresar al menu principal"><span class="icon icon-home"></span><br>Menu Principal</a>
                </div>
                <br><br>
                <hr>
                    <center>
                    <div class="control-group">
                        <div class="controls" style="display: flex;">
                           <div style="width: 20%;"></div>
                            <div class="input-group" style="width: 80%;">
                              <input class="form-control span8 tip" id="searchTerm" onkeyup="doSearch()" title="buscar" placeholder="Buscar">
                            </div>
                            <br>
                            <div style="width: 20%;"></div>

                        </div>
                       </div>
                    <div class="table-responsive-lg" style="max-height: 500px; overflow-y:scroll;">
                    <table class="table table-bordered table-hover" id="datos">
                       <br>
                        <thead class="btn-danger">
                            <tr class="table-danger">
                                <td class="text-center">Tela</td>
                                <td class="text-center">Color</td>
                                <td class="text-center">Peso total en Kg.</td>
                                <td class="text-center">Rollos de Tela</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        include 'conn.php';

                            $sql = "select Nombre_tela, Nombre_color, sum(Peso) as peso, sum(Stock) as stock from inventario_tela inner join tela on inventario_tela.ID_Tela=tela.ID_Tela inner join colores on tela.ID_color=colores.ID_Color inner join seccion_tela on inventario_tela.ID_Seccion=seccion_tela.ID_Seccion group by inventario_tela.ID_Tela asc";
                            $result = mysqli_query($conn, $sql);

                            while ($rd = mysqli_fetch_array($result)){
                                if($rd){
                                echo "<tr>"
                                    ."<td class='text-center'>".$rd["Nombre_tela"]."
                                    </td>"
                                    ."<td class='text-center'>".$rd["Nombre_color"]."
                                    </td>"
                                    ."<td class='text-center'>".$rd["peso"]." Kg.
                                    </td>"
                                    ."<td class='text-center'>".$rd["stock"]." Rollo(s)
                                    </td>";

                                }else if($rd = 0){
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no hay datos para mostrar.</div>';
                                    break;
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <br>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <script src="usuarios/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="usuarios/datatables/jquery.dataTables.js"></script>
    <script src="usuarios/datatables/dataTables.bootstrap.js"></script>


    <script>

        function doSearch(){
            var tableReg = document.getElementById('datos');
            var searchText = document.getElementById("searchTerm").value.toLowerCase();
            var cellsOfRow="";
            var found = false;
            var compareWith="";

            for(var i = 1; i < tableReg.rows.length; i++){
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;

                for(var j = 0; j < cellsOfRow.length && !found; j++){
                    compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    if(searchText.length == 0 || (compareWith.indexOf(searchText) > -1)){
                        found = true;
                    }
                }
                if(found){
                    tableReg.rows[i].style.display= '';
                }else{
                    tableReg.rows[i].style.display='none';
                }
            }
        }
    </script>

    <script>
        $(function(){
        var $tabla = $('#datos');

            $('#seccion').change(function(){
                var value = $(this).val();
                if (value){
                    $('tbody tr.' + value, $tabla).show();
                    $('tbody tr:not(.' + value + ')', $tabla).hide();
                }
                else{
                    // Se ha seleccionado All
                    $('tbody tr', $tabla).show();
                }
            });
        });
    </script>

</body>
</main>
