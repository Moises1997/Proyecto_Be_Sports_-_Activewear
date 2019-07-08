<?php
    include'templates/header.php';
?>

<?php
ob_start();
session_start();
require_once 'config.php';
if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["Privilegio"] == 2) {
        header("location:menu_corte.php");
    }else{
        if($_SESSION["Privilegio"] == 1){
            header("location:menu_administrador.php");
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

<main role="main" class="flex-shrink-0">
    <center>
    <div class="media">
        <center>
        <img src="img/Logo_Be_Sports_Vector.png" class="mr-3" alt="...">
        <a href="logout.php" class="btn btn-outline-danger"title="cerrar sesión"><span class="icon icon-sign-out" style="font-size:20px;"><br><h6>Cerrar<br>Sesión</h6></span></a>
            <div class="media-body">
            </div>
        </center>
    </div>
    </center>
    <div class="container" style="text-align:center;">
        <h4>Bienvenido(a) <br><strong> <?php echo $_SESSION["Usuario"]; ?></strong></h4>
        <span class="label label-info" style="font-size: 0.8em;"><?php echo $_SESSION["Privilegio"] == 1 ? 'Administrador' : 'Encargado(a)<br> Area de Confeccion'; ?></span><br>
        <div class="hora" style="font-size: 0.8em;"><?php
        ini_set("date.timezone", 'America/Mexico_City');?>
            <span class="label label-info"><?php echo date ("d/m/Y");?> |
            <?php
                echo date ("g:i a");
            ?>
            </span>
        </div>
    </div>
    <center>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="confeccion" role="tabpanel" aria-labelledby="confeccion-tab">
            <a class="btn btn-primary" href="modelos-vista.php" role="button"><img src="bootstrap/png/020-blueprint.png" alt="" class="mr-2"><hr><h6>Modelos<br></h6></a>
            <a class="btn btn-primary" href="operaciones.php" role="button"><img src="bootstrap/png/ingeniero.png" alt="" class="mr-2"><hr><h6>Operaciones<br></h6></a>
            <a class="btn btn-primary" href="maquinas.php" role="button"><img src="bootstrap/png/la-maquina-de-coser%20(2).png" alt="" class="mr-2"><hr><h6>Máquinas<br></h6></a>
            <a class="btn btn-primary" href="modelo_operacion.php" role="button"><img src="bootstrap/png/040-rgb.png" alt="" class="mr-2"><hr><h6>Operaciones por<br>Modelo</h6></a>
            <a class="btn btn-primary" href="defectos.php" role="button"><img src="bootstrap/png/error.png" alt="" class="mr-2"><hr><h6>Defectos<br></h6></a>
            <a class="btn btn-primary" href="nomina_besport/nominas.php" role="button"><img src="bootstrap/png/entrega.png" alt="" class="mr-2"><hr><h6>Nómina<br></h6></a>
            <a class="btn btn-primary" href="mi-cuenta.php" role="button"><img src="bootstrap/png/boss-1.png" alt="" class="mr-2"><hr><h6>Mi<br>Cuenta</h6></a>
            <a class="btn btn-primary" href="tutoriales_area_confeccion.php" role="button"><img src="bootstrap/png/problem.png" alt="" class="mr-2"><hr><h6>Tutoriales<br></h6></a>
        </div>
    </div>
</center>
</main>
<?php
    include'templates/pie.php';
?>
