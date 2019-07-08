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
                    if ($_SESSION["Privilegio"] == 1){
                        header("location: menu_administrador.php");
                    }else{
                        if ($_SESSION["Privilegio"] == 10){
                            header("location: menu_vendedor.php");
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

<?php include "usuarios/conn.php"; ?>
<?php include("usuarios/head.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle nomina</title>
    <link rel="icon" href="img/Logo_Be_Sports_Vector.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
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
</head>
<body>
<br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                <h3 class="panel-title">Detalle de Nóminas</h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="pull-left">
                    <a href="menu_administrador.php" class="btn btn-sm btn-success" title="regresar al menu principal"><span class="icon icon-home"></span><br>Menu Principal</a>
                </div>
                <br><br>
                <hr>
                <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" style="text-align:center;" enctype="multipart/form-data">

                    <div class="control-group">
                        <label class="control-label" for="Maquina">Fecha Inicial</label>
                        <div class="controls">
                            <input type="date" name="Fecha1" id="Fecha1" class="form-control span8 tip" required>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label" for="Maquina">Fecha Final</label>
                        <div class="controls">
                            <input type="date" name="Fecha2" id="Fecha2" class="form-control span8 tip" required>
                        </div>
                    </div>
                    <br><br>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="input" id="input" class="btn btn-primary" style="color: white;">Buscar</button>
                        </div>
                    </div>
                </form>
                    <br>
                    <hr style="border: 2px solid #b3ded5;">
                    <center>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-info" type="button"><i class="icon icon-search"></i></button>
                              </div>
                              <input class="form-control span8 tip" id="searchTerm" onkeyup="doSearch()" title="buscar" placeholder="Buscar">
                            </div>
                        </div>
                       </div>
                    <div class="table-responsive-lg" style="max-height: 500px; overflow-y:scroll;">
                    <table class="table table-bordered table-hover" id="datos">
                       <br>
                        <thead class="btn-danger">
                            <tr class="table-danger">
                                <td class="text-center">No. Nomina</td>
                                <td class="text-center">Codigo Empleado</td>
                                <td class="text-left">Nombre Empleado</td>
                                <td class="text-right">Pago</td>
                                <td class="text-right">Fecha</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        include 'conn.php';
                        if(isset($_POST['input'])){
                            $fecha1 = $_POST['Fecha1'];
                            $fecha2 = $_POST['Fecha2'];
                            $usuario = $_SESSION['ID_Usuario'];

                            $sql = "select facturas.id_factura, facturas.total_venta, facturas.fecha_factura, usuarios.Codigo_usuario, usuarios.Nombre_usuario, usuarios.Apellido_paterno, usuarios.Apellido_materno from facturas inner join usuarios on facturas.id_cliente=usuarios.ID_Usuario WHERE fecha_factura between '$fecha1' and '$fecha2' and ID_Usuario='$usuario' order by fecha_factura desc";
                            $result = mysqli_query($conn, $sql);

                            while ($rd = mysqli_fetch_array($result)){
                                if($rd){
                                echo "<tr>"
                                    ."<td class='text-center'>".$rd["id_factura"]."
                                    </td>"
                                    ."<td class='text-center'>".$rd["Codigo_usuario"]."
                                    </td>"
                                    ."<td class='text-left'>".$rd["Nombre_usuario"]." ".$rd["Apellido_paterno"]." ".$rd["Apellido_materno"]."
                                    </td>"
                                    ."<td class='text-right'>$ ".$rd["total_venta"]."
                                    </td>"
                                    ."<td class='text-right'>".$date_added= date('d/m/Y', strtotime($rd['fecha_factura']))."
                                    </td>"
                                    ."</tr>";

                                }else if($rd = 0){
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no hay datos para mostrar.</div>';
                                    break;
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
                    <!--<table class="table table-bordered table-hover">
                       <br>
                        <thead class="btn-success">
                            <tr class="table-success">
                                <td class="text-center">Total a Pagar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <?php/*
                                include 'conn.php';
                                if(isset($_POST['input'])){
                                    $fecha1 = $_POST['Fecha1'];
                                    $fecha2 = $_POST['Fecha2'];

                                    $sql = "select sum(monto) as total from facturas inner join usuarios on facturas.id_cliente=usuarios.ID_Usuario WHERE fecha between '$fecha1' and '$fecha2' and ID_Usuario='$usuario'order by fecha asc";
                                    $result = mysqli_query($conn, $sql);

                                    while ($rd = mysqli_fetch_array($result)){
                                        if($rd){
                                        echo "<tr>"
                                            ."<td class='text-center table-default'>$ ".$rd["total"]."
                                            </td>"
                                            ."</tr>";
                                        }else if($rd = 0){
                                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no hay datos para mostrar.</div>';
                                            break;
                                        }
                                    }
                                }*/
                                ?>
                            </tr>
                        </tbody>
                    </table>-->
                </center>
            </div>
        </div>
    </div>
</body>
</html>
