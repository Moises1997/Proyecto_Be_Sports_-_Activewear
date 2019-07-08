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
    $nombre=$_POST['Nombre_tela'];
    $color=$_POST['ID_Color'];
    $caracteristicas = $_POST['Caracteristicas'];

    $sql1="INSERT INTO tela(ID_Tela, Nombre_tela, Caracteristicas, ID_Color) VALUES ('null', '$nombre', '$caracteristicas', '$color')";

     $verificar_tela = mysqli_query($conn, "SELECT * FROM tela WHERE Nombre_tela = '$nombre' and ID_Color='$color'");
        if(mysqli_num_rows($verificar_tela) > 0){
            echo'<script>
            alert("La tela con el color seleccionado ya esta registrada.");
            window.history.go(-1);
            </script>';
            exit;
        }

    $result=mysqli_query($conn,$sql1);
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
        <div class="pull-right">
            <a href="Registro-color.php" class="btn btn-sm btn-primary"><span class="icon icon-plus"></span><br>Nuevo Color</a>
        </div><br><br>
        <hr>
            <form class="form-horizontal row-fluid" action="registro-tela.php" method="post" enctype="multipart/form-data" style="text-align: center;">
                <div class="control-group">
                    <label class="control-label" for="">Nombre</label>
                    <div class="controls">
                        <input class="form-control span8 tip" type="text" name="Nombre_tela" id="Nombre_tela" placeholder="Nombre Tela" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="Color">Color</label>
                    <div class="controls">
                        <select name="ID_Color" id="ID_Color" class="form-control span8 tip" placeholder="Color" searchable required>
                        <option value="0">-- seleccione --</option>

                        <?php
                            $query = mysqli_query ($conn, "SELECT * FROM colores order by Nombre_color asc");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo "<option value='".$valores[ID_Color]."'>".$valores[Codigo]."&nbsp;&nbsp;&nbsp;&nbsp;".$valores[Nombre_color].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Caracteristicas</label>
                    <div class="controls">
                        <textarea class="form-control span8 tip" type="text" name="Caracteristicas" id="Caracteristicas" placeholder="Caracteristicas"></textarea>
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="telas.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
