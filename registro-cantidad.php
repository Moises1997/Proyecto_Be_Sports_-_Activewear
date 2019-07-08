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
                                else{
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
    }
} else {
    header("location:index.php");
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
        $ID_Modelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
        $piezas = mysqli_real_escape_string($conn,(strip_tags($_POST['piezas'], ENT_QUOTES)));
        $descripcion = mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES)));




        $insert = "INSERT INTO cantidad_modelo(ID_cantidad_modelo, ID_Modelo, cantidad, descripcion) VALUES (NULL, '$ID_Modelo', '$piezas', '$descripcion')";


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
                <h3 class="panel-title">Agregar Cantidad de Modelos</h3>
            </div>
        </div>

        <hr>

        <div class="panel-body">

        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-cantidad.php" method="POST"style="text-align:center;">



            <div class="control-group">
                <label class="control-label" for="ID_Modelo">Modelo</label>
                    <div class="controls">
                        <select name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Modelo" searchable required>
                        <option value="0">-- seleccione --</option>


                        <?php
                            $query = mysqli_query ($conn,"SELECT * FROM modelo");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo "<option value='".$valores[ID_Modelo]."'>".$valores[No_modelo]."&nbsp;&nbsp;".$valores[Nombre_modelo].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>
            <div class="control-group">
                <label class="control-label" for="Piezas">Piezas</label>
                <div class="controls">
                    <input type="number" name="piezas" id="piezas" placeholder="Piezas" class="form-control span8 tip" required>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="descripcion">Descripcion</label>
                <div class="controls">
                    <textarea type="text" name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control span8 tip" style="max-width:100%;"></textarea>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                   <a href="cantidad_modelo.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
            <hr>
        </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
