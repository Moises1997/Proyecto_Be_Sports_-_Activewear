<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["Privilegio"] == 3) {
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
  <?php include("usuarios/head.php");?>
</head>
<body>
<br>
<div class="container">
    <?php
        $idinventario = intval($_GET['ID_Inventario']);
        $sql = mysqli_query($conn, "SELECT * FROM inventario_tela inner join tela on inventario_tela.ID_Tela=tela.ID_Tela INNER JOIN colores ON tela.ID_Color= colores.ID_Color inner join seccion_tela on inventario_tela.ID_Seccion=seccion_tela.ID_Seccion WHERE ID_Inventario='$idinventario'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: detalle_inventario_tela.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idinventario	= intval($_POST['ID_Inventario']);
            $ID_Tela = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Tela'], ENT_QUOTES)));
            $Peso = mysqli_real_escape_string($conn,(strip_tags($_POST['Peso'], ENT_QUOTES)));
            $Stock = mysqli_real_escape_string($conn,(strip_tags($_POST['Stock'], ENT_QUOTES)));
            $ID_Seccion = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Seccion'], ENT_QUOTES)));
            $Fecha = mysqli_real_escape_string($conn,(strip_tags($_POST['Fecha'], ENT_QUOTES)));

            $update = "UPDATE inventario_tela SET ID_Tela='$ID_Tela', Peso='$Peso', Stock='$Stock', ID_Seccion='$ID_Seccion', Fecha_inventario_tela='$Fecha' WHERE ID_Inventario='$idinventario'";

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
                <h3>Actualizar datos del Rollo</h3>
                <strong><?php echo $row['Nombre_tela']." - ".$row['Nombre_color'];?></strong>
            </div>
        </div>
        <hr>
        <br>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" align="center" >
        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID Inventario</label>
            <div class="controls">
                <input type="text" name="ID_Inventario" id="ID_Inventario" value="<?php echo $row['ID_Inventario']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="Color">Tela</label>
            <div class="controls">
                <select required name="ID_Tela" id="ID_Tela" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Tela']; ?>" selected><?php echo $row['Nombre_tela']; ?>&nbsp;&nbsp;=&nbsp;&nbsp;<?php echo $row['Nombre_color']; ?></option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM tela inner join colores on tela.ID_Color=colores.ID_Color order by Nombre_tela asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Tela].'">'.$valores[Nombre_tela]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_color].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Peso</label>
            <div class="controls">
                <input name="Peso" id="Peso" value="<?php echo $row['Peso']; ?>" class="form-control span8 tip" type="text" placeholder="Peso en Kg." required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Stock</label>
            <div class="controls">
                <input name="Stock" id="Stock" value="<?php echo $row['Stock']; ?>" class="form-control span8 tip" type="text" placeholder="stock disponible" required readonly/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Color">Seccion</label>
            <div class="controls">
                <select required name="ID_Seccion" id="ID_Seccion" class="form-control span8 tip" placeholder="Color">
                    <option value="<?php echo $row['ID_Seccion']; ?>" selected><?php echo $row['Nombre_seccion']; ?></option>
                     <?php
                        $query = mysqli_query($conn, "SELECT * FROM seccion_tela order by Nombre_seccion asc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Seccion].'">'.$valores[Nombre_seccion].'</option>';
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
               <a href="detalle_inventario_tela.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
