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
        $ID_Talla = intval($_GET['ID_Talla']);
        $sql = mysqli_query($conn, "SELECT * FROM talla WHERE ID_Talla='$ID_Talla'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: tallas.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $ID_Talla	= intval($_POST['ID_Talla']);
            $Talla = mysqli_real_escape_string($conn,(strip_tags($_POST['Talla'], ENT_QUOTES)));


            $sql = "UPDATE talla SET
            Talla='$Talla' WHERE ID_Talla='$ID_Talla'";

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
                <h3>Actualizar datos de una Talla</h3>
            </div>
        </div>
        <hr>

        <form name="form1" id="form1" class="form-horizontal row-fluid" action="editar_talla.php" method="POST" >
            <div class="control-group" hidden>
                <label class="control-label" for="basicinput">ID Talla</label>
                <div class="controls">
                    <input type="text" name="ID_Talla" id="ID_Talla" value="<?php echo $row['ID_Talla']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                </div>
            </div>
            <br>

            <div class="control-group">
                <label class="control-label" for="basicinput">Talla</label>
                <div class="controls">
                    <input type="text" name="Talla" id="Talla" value="<?php echo $row['Talla']; ?>" placeholder="" class="form-control span8 tip" required>
                </div>
            </div>
            <br>
            <hr>

            <div class="control-group">
                <center>
                <div class="controls">
                    <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                    <a href="tallas.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
                </center>
            </div>
            <br>
        </form>
    </div>
</div>
<br>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
