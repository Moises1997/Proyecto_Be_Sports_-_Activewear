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


<main role="main" class="flex-shrink-0">
    <div class="media">
        <center>
        <img src="img/Logo_Be_Sports_Vector.png" class="mr-3" alt="...">
        <a href="logout.php" class="btn btn-outline-danger"title="cerrar sesión"><span class="icon icon-sign-out" style="font-size:20px;"><br><h6>Cerrar<br>Sesión</h6></span></a>
            <div class="media-body">
                <br>
            </div>
        </center>
    </div>

    <div class="container" style="text-align:center;">
        <h4>Bienvenido <br><strong><?php echo $_SESSION["Usuario"];?></strong></h4>
        <span class="label label-info" style="font-size: 0.8em;"><?php echo $_SESSION["Privilegio"] == 1 ? 'Administrador' : 'Corte'; ?></span>
        <div class="hora" style="font-size: 0.8em;">
            <?php
                ini_set("date.timezone", 'America/Mexico_City');
            ?>
            <span class="label label-info"><?php echo date ("d/m/Y");?> |
            <?php
                echo date ("g:i a");
            ?>
            </span>

        </div>
    </div>
    <center>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link active" id="administrador-tab" data-toggle="tab" href="#administrador" role="tab" aria-controls="administrador" aria-selected="true">Administrador <br><span class="icon icon-user" id="icon"></span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="corte-tab" data-toggle="tab" href="#corte" role="tab" aria-controls="corte" aria-selected="false">Corte <br><span class="icon icon-scissors" id="icon"></span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="confeccion-tab" data-toggle="tab" href="#confeccion" role="tab" aria-controls="confeccion" aria-selected="false">Confección <br><span class="icon icon-tshirt" id="icon"></span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="terminado-tab" data-toggle="tab" href="#terminado" role="tab" aria-controls="terminado" aria-selected="false">Terminado <br><span class="icon icon-clothes-hanger" id="icon"></span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" id="almacen-tab" data-toggle="tab" href="#almacen" role="tab" aria-controls="almacen" aria-selected="false">Almacén <br><span class="icon icon-archive" id="icon"></span></a>
    </li>

    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="administrador" role="tabpanel" aria-labelledby="administrador-tab">
            <a class="btn btn-primary" href="usuarios.php" role="button"><img src="bootstrap/png/network.png" alt="" class="mr-2"><hr><h6>Usuarios<br></h6></a>
            <a class="btn btn-primary" href="modelos.php" role="button"><img src="bootstrap/png/020-blueprint.png" alt="" class="mr-2"><hr><h6>Modelos<br></h6></a>
            <a class="btn btn-primary" href="cantidad_modelo.php" role="button"><img src="bootstrap/png/overflow.png" alt="" class="mr-2"><hr><h6>Cantidad por<br>Modelo</h6></a>
            <a class="btn btn-primary" href="detalle_nomina.php" role="button"><img src="bootstrap/png/banker.png" alt="" class="mr-2"><hr><h6>Detalle<br>de Nómina</h6></a>
            <a class="btn btn-primary" href="nomina_besport/perfil.php" role="button"><img src="bootstrap/png/computer.png" alt="" class="mr-2"><hr><h6>Datos de<br>la Empresa</h6></a>
            <a class="btn btn-primary" href="mi-cuenta.php" role="button"><img src="bootstrap/png/boss-1.png" alt="" class="mr-2"><hr><h6>Mi<br>Cuenta</h6></a>
            <a class="btn btn-primary" href="tutoriales_administrador.php" role="button"><img src="bootstrap/png/problem.png" alt="" class="mr-2"><hr><h6>Tutoriales<br></h6></a>
        </div>

        <div class="tab-pane fade" id="corte" role="tabpanel" aria-labelledby="corte-tab">
            <a class="btn btn-primary" href="telas.php" role="button"><img src="bootstrap/png/tela.png" alt="" class="mr-2"><hr><h6>Listado<br>de Telas</h6></a>
            <a class="btn btn-primary" href="secciones_inventario_tela.php" role="button"><img src="bootstrap/png/almacen.png" alt="" class="mr-2"><hr><h6>Secciones<br></h6></a>
            <a class="btn btn-primary" href="inventario_tela.php" role="button"><img src="bootstrap/png/graph.png" alt="" class="mr-2"><hr><h6>Inventario<br>de Telas</h6></a>
            <a class="btn btn-primary" href="detalle_inventario_tela.php" role="button"><img src="bootstrap/png/packing-2.png" alt="" class="mr-2"><hr><h6>Gestion<br>de Inventario</h6></a>
            <a class="btn btn-primary" href="colores.php" role="button"><img src="bootstrap/png/Colores.png" alt="" class="mr-2"><hr><h6>Listado<br>de Colores</h6></a>
            <a class="btn btn-primary" href="tutoriales_area_corte.php" role="button"><img src="bootstrap/png/problem.png" alt="" class="mr-2"><hr><h6>Tutoriales<br></h6></a>
        </div>

        <div class="tab-pane fade" id="confeccion" role="tabpanel" aria-labelledby="confeccion-tab">
            <a class="btn btn-primary" href="operaciones.php" role="button"><img src="bootstrap/png/ingeniero.png" alt="" class="mr-2"><hr><h6>Operaciones<br></h6></a>
            <a class="btn btn-primary" href="maquinas.php" role="button"><img src="bootstrap/png/la-maquina-de-coser%20(2).png" alt="" class="mr-2"><hr><h6>Máquinas<br></h6></a>
            <a class="btn btn-primary" href="modelo_operacion.php" role="button"><img src="bootstrap/png/040-rgb.png" alt="" class="mr-2"><hr><h6>Operaciones por<br>Modelo</h6></a>
            <a class="btn btn-primary" href="defectos.php" role="button"><img src="bootstrap/png/error.png" alt="" class="mr-2"><hr><h6>Defectos<br></h6></a>
            <a class="btn btn-primary" href="nomina_besport/nominas.php" role="button"><img src="bootstrap/png/entrega.png" alt="" class="mr-2"><hr><h6>Nómina<br></h6></a>
            <a class="btn btn-primary" href="tutoriales_area_confeccion.php" role="button"><img src="bootstrap/png/problem.png" alt="" class="mr-2"><hr><h6>Tutoriales<br></h6></a>
        </div>

        <div class="tab-pane fade" id="terminado" role="tabpanel" aria-labelledby="terminado-tab">
            <a class="btn btn-primary" href="cantidad_modelo_terminado.php" role="button"><img src="bootstrap/png/018-tablet.png" alt="" class="mr-2"><hr><h6>Seguimiento de<br> Modelo</h6></a>
        </div>

        <div class="tab-pane fade" id="almacen" role="tabpanel" aria-labelledby="almacen-tab">
            <a class="btn btn-primary" href="tipo-producto.php" role="button"><img src="bootstrap/png/clothes.png" alt="" class="mr-2"><hr><h6>Tipo<br>de Producto</h6></a>
            <a class="btn btn-primary" href="tallas.php" role="button"><img src="bootstrap/png/size-guide.png" alt="" class="mr-2"><hr><h6>Tallas</h6></a>
            <a class="btn btn-primary" href="secciones_almacen.php" role="button"><img src="bootstrap/png/almacen.png" alt="" class="mr-2"><hr><h6>Secciones<br></h6></a>
            <a class="btn btn-primary" href="inventario_almacen.php" role="button"><img src="bootstrap/png/graph.png" alt="" class="mr-2"><hr><h6>Almacén<br>de Prendas</h6></a>
            <a class="btn btn-primary" href="detalle_inventario_almacen.php" role="button"><img src="bootstrap/png/packing-2.png" alt="" class="mr-2"><hr><h6>Gestión<br>del Almacén</h6></a>
            <a class="btn btn-primary" href="tutoriales_area_almacen.php" role="button"><img src="bootstrap/png/problem.png" alt="" class="mr-2"><hr><h6>Tutoriales<br></h6></a>
        </div>


    </div>
    </center>
</main>

<?php
    include'templates/pie.php';
?>
