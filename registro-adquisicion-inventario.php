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
<?php include("usuarios/head.php");?>
<head>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<br>
<div class="container">

<?php
if(isset($_POST['input'])){
    $ID_Tela=$_POST['ID_Tela'];
    $Peso =$_POST['Peso'];
    $Stock = $_POST['Stock'];
    $ID_Seccion = $_POST['ID_Seccion'];

    $sql="INSERT INTO inventario_tela(ID_Inventario, ID_Tela, Peso, Stock, ID_Seccion) VALUES ('NULL', '$ID_Tela', '$Peso', '$Stock', '$ID_Seccion')";

    $result=mysqli_query($conn,$sql);
    if($result){
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
            <h3 class="panel-title">Agregar Tela</h3>
        </div>
    </div>
    <div class="panel-body">
        <hr>
            <form class="form-horizontal row-fluid" action="registro-adquisicion-inventario.php" method="post" enctype="multipart/form-data" style="text-align: center;">

                <div class="control-group">
                <label class="control-label" for="Color">Tela</label>
                    <div class="controls">
                        <select name="ID_Tela" id="ID_Tela" class="form-control span8 tip" placeholder="Color" searchable required>
                        <option value="0">-- seleccione una tela --</option>

                        <?php
                            $query = mysqli_query ($conn, "SELECT * FROM tela inner join colores on tela.ID_Color=colores.ID_Color order by Nombre_tela asc");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo "<option value='".$valores[ID_Tela]."'>".$valores[Nombre_tela]."&nbsp;&nbsp;=&nbsp;&nbsp;".$valores[Nombre_color].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="">Peso</label>
                    <div class="controls">
                        <input class="form-control span8 tip" type="number" name="Peso" id="Peso" placeholder="Peso en Kg." step="any" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="">Stock</label>
                    <div class="controls">
                        <input class="form-control span8 tip" type="number" name="Stock" id="Stock" placeholder="Stock" min="1" max="1" value="1" required>
                    </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="Color">Seccion</label>
                    <div class="controls">
                        <select name="ID_Seccion" id="ID_Seccion" class="form-control span8 tip" placeholder="Sección" searchable required>
                        <option value="0">-- seleccione una sección --</option>

                        <?php
                            $query = mysqli_query ($conn, "SELECT * FROM seccion_tela order by Nombre_seccion asc");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo "<option value='".$valores[ID_Seccion]."'>".$valores[Nombre_seccion].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="detalle_inventario_tela.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
