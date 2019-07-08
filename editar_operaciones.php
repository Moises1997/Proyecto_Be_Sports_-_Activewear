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
    <?php include("usuarios/head.php");?>
</head>
<body>
<br>

<div class="container">
    <?php
        $idoperacion = intval($_GET['ID_Operacion']);
        $sql = mysqli_query($conn, "SELECT * FROM operaciones INNER JOIN maquina ON operaciones.ID_Maquina = maquina.ID_Maquina WHERE ID_Operacion='$idoperacion'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: operaciones.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idoperacion	= intval($_POST['ID_Operacion']);
            $nombreoperacion = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_operacion'], ENT_QUOTES)));
            $precio = mysqli_real_escape_string($conn,(strip_tags($_POST['Precio'], ENT_QUOTES)));
            $maquina = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Maquina'], ENT_QUOTES)));

            $update = "UPDATE operaciones SET Nombre_operacion='$nombreoperacion', Precio='$precio', ID_Maquina='$maquina' WHERE ID_Operacion = '$idoperacion'";

            $resultado = mysqli_query($conn, $update);
            if($resultado){
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
            <h3>Actualizar datos de una operacion</h3>
        </div>
    </div>
    <hr>
    <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" >

    <div class="control-group" hidden>
        <label class="control-label" for="basicinput">ID Operacion</label>
        <div class="controls">
            <input type="text" name="ID_Operacion" id="ID_Operacion" value="<?php echo $row['ID_Operacion']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
        </div>
    </div>
    <br>

    <div class="control-group">
        <label class="control-label" for="basicinput">Nombre</label>
        <div class="controls">
            <input type="text" name="Nombre_operacion" id="Nombre_operacion" value="<?php echo $row['Nombre_operacion']; ?>" placeholder="" class="form-control span8 tip" required>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="Precio">Precio</label>
        <div class="controls">
            <input type="text" name="Precio" id="Precio" value="<?php echo $row['Precio']; ?>"placeholder="Precio" class="form-control span8 tip" required>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="Maquina">Máquina</label>
        <div class="controls">
            <select required name="ID_Maquina" id="Maquina" class="form-control span8 tip" placeholder="Máquina">
                <option value="<?php echo $row['ID_Maquina']; ?>" selected><?php echo $row['Nombre_maquina']; ?></option>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM maquina ORDER BY Nombre_maquina ASC");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[ID_Maquina].'">'.$valores[Nombre_maquina].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <br>
    <hr>
    <div class="control-group">
        <center>
        <div class="controls">
            <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
            <a href="operaciones.php" class="btn btn-sm btn-danger">Cancelar</a>
        </div>
        </center>
    </div>
    <br>
    </form>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
