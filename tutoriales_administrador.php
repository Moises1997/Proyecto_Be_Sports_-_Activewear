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
                <h4 class="panel-title">Tutoriales Administrador</h4>
            </div>
        </div>
        <div class="panel-body">
           <div class="pull-left">
                <a href="menu_administrador.php" class="btn btn-success"><span class="icon icon-home"></span><br>Menu Principal</a>
            </div><br><br>
            <hr>
            <div class="video">
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Administrador/usuarios.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Usuarios</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Administrador/modelos.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Modelos</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Administrador/cantidad_por_modelo.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Cantidad por Modelo</h4>
                        <p><span></span></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="video">
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Administrador/detalle_nomina.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Detalle de Nómina</h4>
                        <p><span></span></p>
                    </div>
                </div>
                <div class="content">
                    <div class="contenido">
                        <video  controls preload="none">
                            <source src="videos/Administrador/datos_de_la_empresa.webm">
                            Tu navegador no soporta el formato de video
                        </video>
                        <h4>Datos de la Empresa</h4>
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
