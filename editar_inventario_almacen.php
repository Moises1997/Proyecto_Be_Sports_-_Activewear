<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["Privilegio"] == 2) {
        header("location:menu_corte.php");
    }else{
        if ($_SESSION["Privilegio"] == 4){
            header("location: menu_terminado.php");
        }else{
            if ($_SESSION["Privilegio"] == 3){
                header("location: menu_confeccion.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("usuarios/head.php");?>
</head>
<body>
<br>
<div class="container">
    <?php
        $idalmacen = intval($_GET['ID_Almacen']);
        $sql = mysqli_query($conn, "SELECT * FROM almacen inner join modelo on almacen.ID_Modelo=modelo.ID_Modelo inner join seccion_almacen on almacen.ID_Seccion=seccion_almacen.ID_Seccion inner join talla on almacen.ID_Talla=talla.ID_Talla inner join tipo_producto on almacen.ID_Tipo_Producto=tipo_producto.ID_Tipo_Producto WHERE ID_Almacen='$idalmacen'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: detalle_inventario_almacen.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idalmacen	= intval($_POST['ID_Almacen']);
            $ID_Modelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
            $Stock = mysqli_real_escape_string($conn,(strip_tags($_POST['Stock'], ENT_QUOTES)));
            $ID_Seccion = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Seccion'], ENT_QUOTES)));
            $ID_Talla = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Talla'], ENT_QUOTES)));
            $ID_Tipo_Producto = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Tipo_Producto'], ENT_QUOTES)));
            $Fecha = mysqli_real_escape_string($conn,(strip_tags($_POST['Fecha'], ENT_QUOTES)));

            $update = "UPDATE almacen SET ID_Modelo='$ID_Modelo', Stock='$Stock', ID_Seccion='$ID_Seccion', ID_Talla='$ID_Talla', ID_Tipo_Producto='$ID_Tipo_Producto', Fecha_modificacion='$Fecha' WHERE ID_Almacen='$idalmacen'";

            $resultado = mysqli_query($conn, $update);
            if($resultado){
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
                <h3>Actualizar datos del Modelo</h3>
                <strong><?php echo $row['No_modelo']." - ".$row['Nombre_modelo'];?></strong>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" align="center" >
        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID Inventario</label>
            <div class="controls">
                <input type="text" name="ID_Almacen" id="ID_Almacen" value="<?php echo $row['ID_Almacen']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="Color">Modelo</label>
            <div class="controls">
                <select required name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Modelo']; ?>" selected><?php echo $row['No_modelo']; ?>&nbsp;&nbsp;=&nbsp;&nbsp;<?php echo $row['Nombre_modelo']; ?></option>
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
            <label class="control-label" for="basicinput">Stock</label>
            <div class="controls">
                <input name="Stock" id="Stock" value="<?php echo $row['Stock']; ?>" class="form-control span8 tip" type="text" placeholder="stock disponible" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Seccion</label>
            <div class="controls">
                <select required name="ID_Seccion" id="ID_Seccion" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Seccion']; ?>" selected><?php echo $row['Nombre_seccion']; ?></option>
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
                <select required name="ID_Talla" id="ID_Talla" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Talla']; ?>" selected><?php echo $row['Talla']; ?></option>
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
                <select required name="ID_Tipo_Producto" id="ID_Tipo_Producto" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Tipo_Producto']; ?>" selected><?php echo $row['Tipo_producto']; ?></option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM tipo_producto order by tipo_producto asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Tipo_Producto].'">'.$valores[Tipo_producto].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Fecha</label>
            <div class="controls">
                <input name="Fecha" id="Fecha" value="<?php ini_set("date.timezone", 'America/Mexico_City'); echo date('Y/m/d h:i:s'); ?>" class="form-control span8 tip" type="text" placeholder="stock disponible" required readonly/>
            </div>
        </div>
        <hr>
        <div class="control-group">
            <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
               <a href="detalle_inventario_almacen.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
