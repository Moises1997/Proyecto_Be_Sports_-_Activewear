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
<?php include "usuarios/conn.php"; ?>
<?php include("usuarios/head.php");?>
<head>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<br>
<div class="container">

<?php
if(isset($_POST['input'])){
    $ID_Modelo=$_POST['ID_Modelo'];
    $ID_Color=$_POST['ID_Color'];
    $Stock=$_POST['Stock'];
    $ID_Seccion=$_POST['ID_Seccion'];
    $ID_Talla=$_POST['ID_Talla'];
    $ID_Tipo_Producto=$_POST['ID_Tipo_Producto'];

    $sql="INSERT INTO almacen(ID_Almacen, ID_Modelo, ID_Color, Stock, ID_Seccion, ID_Talla, ID_Tipo_Producto) VALUES ('null', '$ID_Modelo', '$ID_Color', '$Stock', '$ID_Seccion', '$ID_Talla', '$ID_Tipo_Producto')";

    $result=mysqli_query($conn,$sql);
    if($result){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div><script>
            window.history.go(-2);
            </script>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
        }
    }
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div align="center">
            <h3 class="panel-title">Agregar Modelo al Almacén</h3>
        </div>
    </div>
    <div class="panel-body">
        <div class="pull-left">
            <a href="detalle_inventario_almacen.php" class="btn btn-danger"><span class="icon icon-arrow-left"></span> Volver</a>
        </div><br>
        <hr>
            <form class="form-horizontal row-fluid" action="registro-almacen.php" method="post" enctype="multipart/form-data" style="text-align: center;">
            <div class="control-group">
            <label class="control-label" for="Color">Modelo</label>
            <div class="controls">
                <select required name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Modelo">
                    <option value="0" selected>-- Selecciona un Modelo --</option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM modelo order by No_modelo asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Modelo].'">'.$valores[No_modelo]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_modelo].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Color</label>
            <div class="controls">
                <select required name="ID_Color" id="ID_Color" class="form-control span8 tip" placeholder="Color">
                    <option value="0" selected>-- Selecciona un color --</option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM colores order by Nombre_color asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Color].'">'.$valores[Codigo]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_color].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Stock</label>
            <div class="controls">
                <input name="Stock" id="Stock" value="" class="form-control span8 tip" type="number" placeholder="stock disponible" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Sección</label>
            <div class="controls">
                <select required name="ID_Seccion" id="ID_Seccion" class="form-control span8 tip" placeholder="Seccion">
                    <option value="0" selected>-- Selecciona una sección --</option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM seccion_almacen order by Nombre_seccion asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Seccion].'">'.$valores[Nombre_seccion].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Talla</label>
            <div class="controls">
                <select required name="ID_Talla" id="ID_Talla" class="form-control span8 tip" placeholder="Talla">
                    <option value="0" selected>-- Selecciona una Talla --</option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM talla order by Talla asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Talla].'">'.$valores[Talla].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Tipo Producto</label>
            <div class="controls">
                <select required name="ID_Tipo_Producto" id="ID_Tipo_Producto" class="form-control span8 tip" placeholder="Tipo de Producto">
                    <option value="0" selected>-- Selecciona un Tipo de Producto --</option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM tipo_producto order by tipo_producto asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Tipo_Producto].'">'.$valores[Tipo_producto].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
                <hr>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="detalle_inventario_almacen.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
