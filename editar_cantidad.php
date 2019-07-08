<?php
ob_start();
session_start();
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
    $id_cantidad_modelo = intval($_GET['ID_cantidad_modelo']);
    $sql = mysqli_query($conn, "SELECT * FROM cantidad_modelo INNER JOIN modelo ON cantidad_modelo.ID_Modelo = modelo.ID_Modelo WHERE ID_cantidad_modelo='$id_cantidad_modelo'");
    if(mysqli_num_rows($sql) == 0){
        header("Location: cantidad_modelo.php");
    }else{
        $row = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['update'])){
        $id_cantidad_modelo	= intval($_POST['ID_cantidad_modelo']);
        $ID_Modelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
        $piezas = mysqli_real_escape_string($conn,(strip_tags($_POST['piezas'], ENT_QUOTES)));
        $descripcion = mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES)));


        $update = "UPDATE cantidad_modelo SET
        cantidad='$piezas', descripcion='$descripcion', ID_Modelo='$ID_Modelo' WHERE ID_cantidad_modelo = '$id_cantidad_modelo'";



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
                <h3>Actualizar datos de una cantidad por modelo</h3>
            </div>
        </div>
        <div class="panel-body">
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" >

            <div class="control-group" hidden>
                <label class="control-label" for="basicinput">ID cantidad modelo</label>
                <div class="controls">
                    <input type="text" name="ID_cantidad_modelo" id="ID_cantidad_modelo" value="<?php echo $row['ID_cantidad_modelo']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="Modelo">Modelo</label>
                <div class="controls">
                    <select required name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Modelo">
                    <option value="<?php echo $row['ID_Modelo']; ?>" selected><?php echo $row['No_modelo']."&nbsp;&nbsp;=&nbsp;&nbsp;".$row['Nombre_modelo']; ?></option>
                    <?php
                        $query = mysqli_query ($conn, "SELECT * FROM modelo");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Modelo].'">'.$valores[No_modelo].'&nbsp;&nbsp;=&nbsp;&nbsp;'.$valores[Nombre_modelo].'</option>';
                        }
                    ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Piezas</label>
                <div class="controls">
                    <input type="number" name="piezas" id="piezas" value="<?php echo $row['cantidad']; ?>" placeholder="" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label" for="Descripcion">Descripcion</label>
                <div class="controls">
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>"placeholder="descripcion" class="form-control span8 tip">
                </div>
            </div>
            <br>
            <hr>

            <div class="control-group">
                <center>
                <div class="controls">
                    <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                    <a href="cantidad_modelo.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
                </center>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
