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
        $ID_Color = intval($_GET['ID_Color']);
        $sql = mysqli_query($conn, "SELECT * FROM colores WHERE ID_Color='$ID_Color'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: colores.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $ID_Color	= intval($_POST['ID_Color']);
            $Codigo = mysqli_real_escape_string($conn,(strip_tags($_POST['Codigo'], ENT_QUOTES)));
            $Nombre_color = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_color'], ENT_QUOTES)));

            $sql = "UPDATE colores SET Codigo='$Codigo', Nombre_color='$Nombre_color' WHERE ID_Color='$ID_Color'";

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
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="editar_color.php" method="POST" >
            <div class="control-group" hidden>
                <label class="control-label" for="basicinput">ID Color</label>
                <div class="controls">
                    <input type="text" name="ID_Color" id="ID_Color" value="<?php echo $row['ID_Color']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="basicinput">Codigo</label>
                <div class="controls">
                    <input type="text" name="Codigo" id="Codigo" value="<?php echo $row['Codigo']; ?>" placeholder="" class="form-control span8 tip">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Color</label>
                <div class="controls">
                    <input type="text" name="Nombre_color" id="Nombre_color" value="<?php echo $row['Nombre_color']; ?>" placeholder="" class="form-control span8 tip" required>
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
                <br>
            </div>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
