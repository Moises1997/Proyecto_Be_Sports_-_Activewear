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
        $idseccion = intval($_GET['ID_Seccion']);
        $sql = mysqli_query($conn, "SELECT * FROM seccion_tela WHERE ID_Seccion='$idseccion'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: secciones_inventario_tela.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idseccion	= intval($_POST['ID_Seccion']);
            $Seccion = mysqli_real_escape_string($conn,(strip_tags($_POST['Seccion'], ENT_QUOTES)));

            $update = "UPDATE seccion_tela SET ID_Seccion='$idseccion', Nombre_seccion='$Seccion' WHERE ID_Seccion='$idseccion'";

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
                <h3>Actualizar datos de la Sección</h3>
                <strong class="label btn-default"><?php echo $row['Nombre_seccion'];?></strong>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" align="center" >
        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID Inventario</label>
            <div class="controls">
                <input type="text" name="ID_Seccion" id="ID_Seccion" value="<?php echo $row['ID_Seccion']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="basicinput">Nombre Sección</label>
            <div class="controls">
                <input name="Seccion" id="Seccion" value="<?php echo $row['Nombre_seccion']; ?>" class="form-control span8 tip" type="text" placeholder="Nombre de la Sección" required/>
            </div>
        </div>
        <hr>

        <div class="control-group">
            <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
               <a href="secciones_inventario_tela.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
