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
<?php include("usuarios/head.php");?>
<head>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<br>
<div class="container">

<?php
if(isset($_POST['input'])){
    $Talla = mysqli_real_escape_string($conn,(strip_tags($_POST['Talla'], ENT_QUOTES)));

    $insert = "INSERT INTO talla (ID_Talla, Talla) VALUES (NULL,'$Talla')";

    $verificar_talla = mysqli_query($conn, "SELECT * FROM talla WHERE Talla = '$Talla'");
    if(mysqli_num_rows($verificar_talla) > 0){
        echo'<script>
        alert("la talla ya está registrada");
        window.history.go(-1);
        </script>';
        exit;

    }
    $resultado = mysqli_query($conn, $insert);
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
                <h3 class="panel-title">Registro de Tallas</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-tallas.php" method="POST" style="text-align:center;">
            <div class="control-group">
                <label class="control-label" for="Seccion">Talla</label>
                <div class="controls">
                    <input name="Talla" id="Talla" class=" form-control span8 tip" type="text" placeholder="Talla" required />
                </div>
            </div>
            <hr>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                    <a href="javascript:window.history.back();" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div><br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
