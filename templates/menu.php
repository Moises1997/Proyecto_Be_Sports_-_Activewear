<?php
    include'header.php';
?>
    <header>

<?php
ob_start();
session_start();
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<?php
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
                    }
                }
            }
        }
    }
} else {
    header("location:index.php");
}
?>

   <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="display: none;">
      <a class="navbar-brand" href="#">Be Sports & Activewear </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION["logged_in"])) {?>
            <?php } else {
            ?>
              <?php
              if ($_SESSION["Privilegio"] == 1) {
              ?>

              <li class="nav-item dropdown">
               <li class="nav-item-active">
                   <a class="nav-link" href="login.php">Inicio</a>
               </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrador</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Modelos</a>
                  <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                </div>
               </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corte</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Registro de Telas</a>
                  <a class="dropdown-item" href="#">Adquisiciones</a>
                  <a class="dropdown-item" href="#">Salida de Tela</a>
                  <a class="dropdown-item" href="#">Inventario</a>
                </div>
               </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Confeccion</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Registro de Operaciones</a>
                  <a class="dropdown-item" href="#">Defectos</a>
                  <a class="dropdown-item" href="#">Incidencias</a>
                  <a class="dropdown-item" href="#">Maquinas</a>
                  <a class="dropdown-item" href="#">Entrega de Operaciones</a>
                </div>
               </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Terminado</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Seguimiento de Modelo</a>
                </div>
               </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacen</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Almacen</a>
                  <a class="dropdown-item" href="#">Entradas</a>
                  <a class="dropdown-item" href="#">Salidas</a>
                </div>
               </li>
              </li>
              <?php
              }else{
                  if ($_SESSION["Privilegio"] == 2) {?>
                  <li class="nav-item-active">
                      <a class="nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item-active">
                      <a class="nav-link" href="#">Registro de telas</a>
                  </li>
                  <li class="nav-item-active">
                      <a class="nav-link" href="#">Adquisiciones</a>
                  </li>
                  <li class="nav-item-active">
                      <a class="nav-link" href="#">Salida de Tela</a>
                  </li>
                  <li class="nav-item-active">
                      <a class="nav-link" href="#">Inventario</a>
                  </li>
              <?php
                  }else{
                      if ($_SESSION["Privilegio"] == 3) {?>
                      <li class="nav-item-active">
                          <a class="nav-link" href="index.php">Inicio</a>
                      </li>
                      <li class="nav-item-active">
                          <a class="nav-link" href="#">Registro de Operaciones</a>
                      </li>
                      <li class="nav-item-active">
                          <a class="nav-link" href="#">Defectos</a>
                      </li>
                      <li class="nav-item-active">
                          <a class="nav-link" href="#">Incidencias</a>
                      </li>
                      <li class="nav-item-active">
                          <a class="nav-link" href="#">Maquinas</a>
                      </li>
                         <li class="nav-item-active">
                          <a class="nav-link" href="#">Entrega de Operaciones</a>
                      </li>
                      <?php
                      }else{
                          if ($_SESSION["Privilegio"] == 4) {?>
                          <li class="nav-item-active">
                              <a class="nav-link" href="index.php">Inicio</a>
                          </li>
                          <li class="nav-item-active">
                              <a class="nav-link" href="#">Seguimiento de Modelo</a>
                          </li>
                          <?php
                          }else{
                              if ($_SESSION["Privilegio"] == 5) {?>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="index.php">Inicio</a>
                                  </li>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="#">Almacén</a>
                                  </li>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="#">Entradas</a>
                                  </li>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="#">Salidas</a>
                                  </li>
                              <?php
                              }else{
                                  if ($_SESSION["Privilegio"] == 6) {?>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="index.php">Inicio</a>
                                  </li>
                                  <li class="nav-item-active">
                                      <a class="nav-link" href="#">Nomina</a>
                                  </li>
                                  <?php
                                  }
                              }
                          }
                      }
                  }
              }
}?>
    </ul>
    <hr style="background: #fff;">
    <ul class="navbar-nav mr-left">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hola, <?php echo $_SESSION["Usuario"] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Mi Cuenta</a><hr>
                  <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
  </div>
</nav>
</header>
