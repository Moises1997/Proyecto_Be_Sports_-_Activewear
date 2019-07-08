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
        $ID_Modelo = mysqli_real_escape_string($conn,(strip_tags($_POST['ID_Modelo'], ENT_QUOTES)));
        $Operaciones = $_POST['Operaciones'];

        foreach($Operaciones as $llave => $Valor){
            $insert = "INSERT INTO modelo_operacion (ID_Modelo_Operacion, ID_Modelo, ID_Operacion) VALUES ('NULL', '$ID_Modelo', '$Valor')";
            $resultado = mysqli_query($conn, $insert);
        }

        if($resultado){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div><script>
            window.history.go(-2);
            </script>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div><script>
            window.history.go(-1);
            </script>';
        }
    }
    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h3 class="panel-title">Agregar Modelo-Operación</h3>
            </div>
        </div>
        <div class="panel-body">
        <hr>


        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-modelo-operaciones.php" method="POST" style="text-align:center;" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label" for="Nombre">No. Modelo</label>
                <div class="controls">
                    <select required name="ID_Modelo" id="ID_Modelo" class="form-control span8 tip" placeholder="Modelo">
                        <option value="----------">-- Seleccione el Modelo --</option>

                        <?php
                        $query = mysqli_query ($conn,"SELECT * FROM modelo order by ID_Modelo desc");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[ID_Modelo].'">'.$valores[No_modelo].'&nbsp;&nbsp; = &nbsp;&nbsp;'.$valores[Nombre_modelo].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Operaciones</label>
                <div id="cont_checkbox" style="text-align:left;">
                    <?php
                    $SQL=$conn->query("SELECT * FROM operaciones ORDER BY Nombre_operacion");
                    $contador = 0;
                    while ($row =$SQL->fetch_array()){
                        if($contador == 0){
                            echo '<div id="mostrar_checkbox">';
                            $contador ++;
                        }else {
                            $contador ++;
                        }
                        echo "<input id=\"checkbox\" type=\"checkbox\" name=\"Operaciones[]\" class=\"form-control sapn8 tip\" value=\"".$row['ID_Operacion']."\">&nbsp;&nbsp;".$row['Nombre_operacion']."&nbsp;&nbsp;=&nbsp;&nbsp;$".$row['Precio']."<br>";
                        if($contador == 200){
                            echo "</div>";
                            $contador = 0;
                        }
                    }
                    ?>
                </div>
            </div>
            <br><br>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                   <a href="modelo_operacion.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
            <br>
        </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
