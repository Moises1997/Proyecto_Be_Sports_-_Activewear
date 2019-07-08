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
<link rel="stylesheet" href="css/estilos_videos.css">
</head>
<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h4 class="panel-title">Tutoriales Área de corte</h4>
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
                        <video controls preload="none">
                            <source src="videos/Corte/listado_de_telas.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Listado de Telas</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video controls preload="none">
                            <source src="videos/Corte/listado_de_secciones.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Secciones</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video controls preload="none">
                            <source src="videos/Corte/gestion_de_inventario.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Inventario de Telas y Gestión</h4>
                        <p><span></span></p>
                    </div>
                </div>
            </div>
            <br>
            <div class="video">
                <div class="content">
                    <div class="contenido">
                        <video controls preload="none">
                            <source src="videos/Corte/colores.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Colores</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video controls preload="none">
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
