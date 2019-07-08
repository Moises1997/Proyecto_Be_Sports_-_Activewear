<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if($_SESSION["Privilegio"] == 2){
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
<link rel="stylesheet" href="css/estilos_videos.css">
</head>
<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h4 class="panel-title">Tutoriales Área de álmacen</h4>
            </div>
        </div>
        <div class="panel-body">
           <div class="pull-left">
                <a href="menu_corte.php" class="btn btn-success"><span class="icon icon-home"></span><br>Menu Principal</a>
            </div><br><br>
            <hr>
            <div class="video">
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Almacen/tipo_de_producto.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Tipo de Producto</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Almacen/tallas.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Tallas</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Almacen/secciones_de_almacen.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Secciones</h4>
                        <p><span></span></p>
                    </div>
                </div>
            </div>
            <br>
            <div class="video">
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Almacen/inventario%20de%20almacen.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Almacen de Prendas</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Almacen/gestion_de_almacen.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Gestion del Almacen</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Para_todos/mi_cuenta.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Mi Cuenta</h4>
                        <p><span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
