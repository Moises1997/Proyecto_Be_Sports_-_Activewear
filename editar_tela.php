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
        $idtela = intval($_GET['ID_Tela']);
        $sql = mysqli_query($conn, "SELECT * FROM tela INNER JOIN colores ON tela.ID_Color= colores.ID_Color WHERE ID_Tela='$idtela'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: telas.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idtela	= intval($_POST['ID_Tela']);
            $nombre = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_tela'], ENT_QUOTES)));
            $color = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Color'], ENT_QUOTES)));

            $caracteristicas  = mysqli_real_escape_string($conn,(strip_tags($_POST['Caracteristicas'], ENT_QUOTES)));


            $update = mysqli_query($conn, "UPDATE tela SET
            Nombre_tela='$nombre', ID_Color='$color', Caracteristicas='$caracteristicas'
            WHERE ID_Tela='$idtela'") or die(mysqli_error());
            if($update){
                echo "<script>alert('Los datos han sido actualizados!'); window.location = 'inventario-tela.php'</script>";
            }else{
                echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'inventario-tela.php'</script>";
            }
        }
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h3>Actualizar datos de una Tela</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="editar_tela.php" method="POST" >

        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID Tela</label>
            <div class="controls">
                <input type="text" name="ID_Tela" id="ID_Tela" value="<?php echo $row['ID_Tela']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="basicinput">Nombre</label>
            <div class="controls">
                <input type="text" name="Nombre_tela" id="Nombre_tela" value="<?php echo $row['Nombre_tela']; ?>" placeholder="" class="form-control span8 tip" required>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="Color">Color</label>
            <div class="controls">
                <select required name="ID_Color" id="Color" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Color']; ?>" selected><?php echo $row['Codigo']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Nombre_color']; ?></option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM colores");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Color].'">'.$valores[Codigo]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_color].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Caracteristicas</label>
            <div class="controls">
                <input name="Caracteristicas" id="Caracteristicas" value="<?php echo $row['Caracteristicas']; ?>" class=" form-control span8 tip" type="Caracteristicas" />
            </div>
        </div>
        <br>
        <hr>

        <div class="control-group">
            <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                <a href="telas.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
