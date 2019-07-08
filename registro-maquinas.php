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
<?php include("usuarios/head.php");?>
<head>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<br>
<div class="container">

    <?php
    if(isset($_POST['input'])){

        $nombremaquina = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_maquina'], ENT_QUOTES)));

        $insert = "INSERT INTO maquina(ID_Maquina, Nombre_Maquina) VALUES (NULL,'$nombremaquina')";

        $verificar_nombre = mysqli_query($conn, "SELECT * FROM maquina WHERE Nombre_maquina = '$nombremaquina'");
        if(mysqli_num_rows($verificar_nombre) > 0){
            echo'<script>
            alert("la maquina ya está registrada");
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
                <h3 class="panel-title">Agregar Nueva Máquina</h3>
            </div>
        </div>
        <hr>
        <br>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-maquinas.php" method="POST" style="text-align:center;">
           <div class="control-group">
                <label class="control-label" for="Maquina">Máquina</label>
                <div class="controls">
                    <input name="Nombre_maquina" id="Nombre_maquina" class=" form-control span8 tip" type="text" placeholder="Máquina" required />
                </div>
            </div>
            <br>
            <hr>

            <div class="control-group">
               <center>
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                    <a href="javascript:window.history.back();" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
                </center>
            </div>
            <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
