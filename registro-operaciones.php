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
        $nombreoperacion = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_operacion'], ENT_QUOTES)));
        $precio = mysqli_real_escape_string($conn,(strip_tags($_POST['Precio'], ENT_QUOTES)));
        $maquina = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Maquina'], ENT_QUOTES)));



        $insert = "INSERT INTO operaciones(ID_Operacion, Nombre_operacion, Precio, ID_Maquina) VALUES (NULL,'$nombreoperacion', '$precio', '$maquina')";

        $verificar_operacion = mysqli_query($conn, "SELECT * FROM operaciones WHERE Nombre_operacion = '$nombreoperacion' AND ID_Maquina = '$maquina'");
        if(mysqli_num_rows($verificar_operacion) > 0){
            echo'<script>
            alert("la operacion y la maquina ya estan registradas en una misma operacion.");
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
                <h3 class="panel-title">Agregar Operación</h3>
            </div>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="registro-maquinas.php" class="btn btn-sm btn-primary"><span class="icon icon-plus"></span><br>Agregar Maquina</a>
            </div><br><br>
        <hr>


        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-operaciones.php" method="POST" style="text-align:center;">
            <div class="control-group">
                <label class="control-label" for="Nombre">Nombre</label>
                <div class="controls">
                    <input type="text" name="Nombre_operacion" id="Nombre_operacio" placeholder="Nombre" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Precio">Precio</label>
                <div class="controls">
                    <input type="text" name="Precio" id="Precio" placeholder="Precio" class="form-control span8 tip" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="Maquina">Máquina</label>
                <div class="controls">
                    <select required name="ID_Maquina" id="Maquina" class="form-control span8 tip" placeholder="Máquina">
                        <option value="----------">-- Máquina --</option>

                        <?php
                        $query = mysqli_query ($conn,"SELECT * FROM maquina");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Maquina].'">'.$valores[Nombre_maquina].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                   <a href="operaciones.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
            </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
