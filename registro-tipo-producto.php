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
    $Tipo_producto = mysqli_real_escape_string($conn,(strip_tags($_POST['Tipo_producto'], ENT_QUOTES)));

    $insert = "INSERT INTO tipo_producto (ID_Tipo_Producto, Tipo_producto) VALUES (NULL,'$Tipo_producto')";

    $verificar_tipo_producto = mysqli_query($conn, "SELECT * FROM tipo_producto WHERE Tipo_producto = '$Tipo_producto'");
    if(mysqli_num_rows($verificar_tipo_producto) > 0){
        echo'<script>
        alert("El tipo de producto ya esta registrado");
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
                <h3 class="panel-title">Registro de Tipo de Producto</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-tipo-producto.php" method="POST" style="text-align:center;">
            <div class="control-group">
                <label class="control-label" for="Seccion">Producto</label>
                <div class="controls">
                    <input name="Tipo_producto" id="Tipo_producto" class=" form-control span8 tip" type="text" placeholder="Producto" required />
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
