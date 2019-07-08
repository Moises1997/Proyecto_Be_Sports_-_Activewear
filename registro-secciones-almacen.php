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
            if ($_SESSION["Privilegio"] == 2){
                header("location: menu_corte.php");
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
    $Seccion=$_POST['Seccion'];

    $sql="INSERT INTO seccion_almacen(ID_Seccion, Nombre_seccion) VALUES ('NULL', '$Seccion')";

    $verificar_seccion = mysqli_query($conn, "SELECT * FROM seccion_almacen WHERE Nombre_seccion = '$Seccion'");
    if(mysqli_num_rows($verificar_seccion) > 0){
        echo'<script>
        alert("La sección ya esta registrada.");
        window.history.go(-1);
        </script>';
        exit;
    }

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
            <h3 class="panel-title">Agregar Sección</h3>
        </div>
    </div>
    <div class="panel-body">
        <hr>
            <form class="form-horizontal row-fluid" action="registro-secciones-almacen.php" method="post" enctype="multipart/form-data" style="text-align: center;">

                <div class="control-group">
                    <label class="control-label" for="">Nombre Sección</label>
                    <div class="controls">
                        <input class="form-control span8 tip" type="text" name="Seccion" id="Seccion" placeholder="Nombre de la Sección" required>
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="secciones_almacen.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
