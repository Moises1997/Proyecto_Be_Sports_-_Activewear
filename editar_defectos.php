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
        $iddefecto = intval($_GET['ID_Defecto']);
        $sql = mysqli_query($conn, "SELECT * FROM defectos INNER JOIN modelo ON defectos.ID_Modelo = modelo.ID_Modelo INNER JOIN usuarios ON defectos.ID_Usuario = usuarios.ID_usuario WHERE ID_Defecto='$iddefecto'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: defectos.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $iddefecto	= intval($_POST['ID_Defecto']);
            $piezas = mysqli_real_escape_string($conn,(strip_tags($_POST['Piezas'], ENT_QUOTES)));
            $descripcion = mysqli_real_escape_string($conn,(strip_tags($_POST['Descripcion'], ENT_QUOTES)));
            $idmodelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
            $idusuario = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Usuario'], ENT_QUOTES)));

            $update = "UPDATE defectos SET Piezas='$piezas', Descripcion='$descripcion', ID_Modelo='$idmodelo', ID_Usuario ='$idusuario' WHERE ID_Defecto = '$iddefecto'";



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
                <h3>Actualizar datos de un defecto</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" >

        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID defecto</label>
            <div class="controls">
                <input type="text" name="ID_Defecto" id="ID_Defecto" value="<?php echo $row['ID_Defecto']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="ID_Usuario">Empleado</label>
            <div class="controls">
                <select required name="ID_Usuario" id="ID_Usuario" class="form-control span8 tip" placeholder="Empleado">
                    <option value="<?php echo $row['ID_Usuario']; ?>" selected><?php echo $row['Nombre_usuario'];?> &nbsp; <?php echo $row['Apellido_paterno']; ?> &nbsp; <?php echo $row['Apellido_materno']; ?></option>
                       <?php
                        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE Privilegio BETWEEN 6 AND 9");
                        while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[ID_Usuario].'">'.$valores[Nombre_usuario].'&nbsp;&nbsp;'.$valores[Apellido_paterno].'&nbsp;&nbsp;'.$valores[Apellido_materno].'</option>';
                        }
                    ?>
                </select>
            </div>
         </div>

        <div class="control-group">
            <label class="control-label" for="Modelo">Modelo</label>
            <div class="controls">
                <select required name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Modelo">
                    <option value="<?php echo $row['ID_Modelo']; ?>" selected><?php echo $row['No_modelo']; ?></option>
                       <?php
                            $query = mysqli_query ($conn, "SELECT * FROM modelo");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[ID_Modelo].'">'.$valores[No_modelo]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_modelo].'</option>';
                            }
                        ?>
                </select>
            </div>
         </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Piezas</label>
            <div class="controls">
                <input type="number" name="Piezas" id="Piezas" value="<?php echo $row['Piezas']; ?>" placeholder="" class="form-control span8 tip" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Descripcion">Descripcion</label>
            <div class="controls">
                <input type="text" name="Descripcion" id="Descripcion" value="<?php echo $row['Descripcion']; ?>"placeholder="Descripcion" class="form-control span8 tip" required>
            </div>
        </div>
        <br>
        <hr>

        <div class="control-group">
           <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
               <a href="defectos.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        </form>
        <br>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
