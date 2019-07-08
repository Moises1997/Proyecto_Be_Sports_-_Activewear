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
        $piezas = mysqli_real_escape_string($conn,(strip_tags($_POST['Piezas'], ENT_QUOTES)));
        $descripcion = mysqli_real_escape_string($conn,(strip_tags($_POST['Descripcion'], ENT_QUOTES)));
        $idmodelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
        $idusuario = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Usuario'], ENT_QUOTES)));



        $insert = "INSERT INTO defectos(ID_Defecto, Piezas, Descripcion, ID_Modelo, ID_Usuario) VALUES (NULL,'$piezas', '$descripcion', '$idmodelo', '$idusuario')";


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
                <h3 class="panel-title">Agregar Defecto</h3>
            </div>
        </div>

        <hr>



        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-defectos.php" method="POST"style="text-align:center;">


            <div class="control-group">
                <label class="control-label" for="ID_Usuario">Empleado</label>
                <div class="controls">
                    <select required name="ID_Usuario" id="ID_Usuario" class="form-control span8 tip" placeholder="ID_Usuario">
                        <option value="----------">-- Empleado --</option>

                        <?php
                        $query = mysqli_query ($conn, "SELECT * FROM usuarios WHERE Privilegio BETWEEN 6 AND 9 order by Nombre_usuario");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Usuario].'">'.$valores[Nombre_usuario].' '.$valores[Apellido_paterno].' '.$valores[Apellido_materno].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="ID_Modelo">Modelo</label>
                    <div class="controls">
                        <select name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="ID_Modelo" searchable required>
                        <option value="0">-- seleccione --</option>
                        <?php
                            $query = mysqli_query ($conn, "SELECT * FROM modelo order by No_modelo asc");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo "<option value='".$valores[ID_Modelo]."'>".$valores[No_modelo]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_modelo].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>
            <div class="control-group">
                <label class="control-label" for="Piezas">Piezas</label>
                <div class="controls">
                    <input type="number" name="Piezas" id="Piezas" placeholder="Piezas" class="form-control span8 tip" required>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="Descripcion">Descripcion</label>
                <div class="controls">
                    <textarea type="text" name="Descripcion" id="Descripcion" placeholder="Descripcion" class="form-control span8 tip" required style="max-width:100%;"></textarea>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                   <a href="defectos.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
            <hr>
        </form>
            </div>
    </div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
