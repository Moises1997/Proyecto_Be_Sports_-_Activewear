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
<head>
  <?php include("usuarios/head.php");?>
</head>
<body>
<br>

<div class="container">
    <?php
        $ID_Tipo_Producto = intval($_GET['ID_Tipo_Producto']);
        $sql = mysqli_query($conn, "SELECT * FROM tipo_producto WHERE ID_Tipo_Producto='$ID_Tipo_Producto'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: tipo-producto.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $ID_Tipo_Producto	= intval($_POST['ID_Tipo_Producto']);
            $Tipo_producto = mysqli_real_escape_string($conn,(strip_tags($_POST['Tipo_producto'], ENT_QUOTES)));
            $Nombre_color = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_color'], ENT_QUOTES)));


            $sql = "UPDATE tipo_producto SET
            Tipo_producto='$Tipo_producto' WHERE ID_Tipo_Producto='$ID_Tipo_Producto'";

            $update = mysqli_query($conn, $sql);
            if($update){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido actualizados correctamente.</div><script>
                window.history.go(-2);
                </script>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo actualizar los datos.</div>';
            }
        }
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h3>Actualizar datos de un Color</h3>
            </div>
        </div>
        <hr>

        <form name="form1" id="form1" class="form-horizontal row-fluid" action="editar_tipo_producto.php" method="POST" >
            <div class="control-group" hidden>
                <label class="control-label" for="basicinput">ID Producto</label>
                <div class="controls">
                    <input type="text" name="ID_Tipo_Producto" id="ID_Tipo_Producto" value="<?php echo $row['ID_Tipo_Producto']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                </div>
            </div>
            <br>

            <div class="control-group">
                <label class="control-label" for="basicinput">Producto</label>
                <div class="controls">
                    <input type="text" name="Tipo_producto" id="Tipo_producto" value="<?php echo $row['Tipo_producto']; ?>" placeholder="Producto" class="form-control span8 tip" required>
                </div>
            </div>
            <br>
            <hr>

            <div class="control-group">
                <center>
                <div class="controls">
                    <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                    <a href="javascript:window.history.back();" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
                </center>
            </div>
            <br>
        </form>
    </div>
</div>
<br/>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
