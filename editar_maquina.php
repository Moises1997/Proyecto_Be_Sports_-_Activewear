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
        $ID_Maquina = intval($_GET['ID_Maquina']);
        $sql = mysqli_query($conn, "SELECT * FROM maquina WHERE ID_Maquina='$ID_Maquina'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: maquinas.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $ID_Maquina	= intval($_POST['ID_Maquina']);
            $Maquina = mysqli_real_escape_string($conn,(strip_tags($_POST['Maquina'], ENT_QUOTES)));


            $sql = "UPDATE maquina SET Nombre_maquina='$Maquina' WHERE ID_Maquina='$ID_Maquina'";

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
                <h3>Actualizar datos de una Maquina</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="editar_maquina.php" method="POST" >
            <div class="control-group" hidden>
                <label class="control-label" for="basicinput">ID Maquina</label>
                <div class="controls">
                    <input type="text" name="ID_Maquina" id="ID_Maquina" value="<?php echo $row['ID_Maquina']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="basicinput">Maquina</label>
                <div class="controls">
                    <input type="text" name="Maquina" id="Maquina" value="<?php echo $row['Nombre_maquina']; ?>" placeholder="Nombre de la Maquina" class="form-control span8 tip" required>
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
