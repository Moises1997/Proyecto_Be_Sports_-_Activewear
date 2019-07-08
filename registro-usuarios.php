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
        $codigo = mysqli_real_escape_string($conn,(strip_tags($_POST['Codigo_usuario'], ENT_QUOTES)));
        $nombreusuario = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_usuario'], ENT_QUOTES)));
        $apellidopaterno = mysqli_real_escape_string($conn,(strip_tags($_POST['Apellido_paterno'], ENT_QUOTES)));
        $apellidomaterno = mysqli_real_escape_string($conn,(strip_tags($_POST['Apellido_materno'], ENT_QUOTES)));
        $usuario = mysqli_real_escape_string($conn,(strip_tags($_POST['Usuario'], ENT_QUOTES)));
        $password = mysqli_real_escape_string($conn,(strip_tags($_POST['Password'], ENT_QUOTES)));
        $puesto = mysqli_real_escape_string($conn,(strip_tags($_POST['Puesto'], ENT_QUOTES)));
        $privilegio = mysqli_real_escape_string($conn,(strip_tags($_POST['Privilegio'], ENT_QUOTES)));
        $fecha_de_creacion=date("Y-m-d H:i:s");

        $insert = "INSERT INTO usuarios(ID_Usuario, Codigo_usuario, Nombre_usuario, Apellido_paterno, Apellido_materno, Usuario, Password, Puesto, Privilegio, Fecha_de_creacion) VALUES (NULL, '$codigo', '$nombreusuario', '$apellidopaterno', '$apellidomaterno', '$usuario', '$password', '$puesto', '$privilegio', '$fecha_de_creacion')";

        $verificar_codigo = mysqli_query($conn, "SELECT * FROM usuarios WHERE Codigo_usuario = '$codigo'");
        if(mysqli_num_rows($verificar_codigo) > 0){
            echo'<script>
            alert("el codigo de empleado ya ha sido registrado");
            window.history.go(-1);
            </script>';
            exit;
        }

        $verificar_nombres = mysqli_query($conn, "SELECT * FROM usuarios WHERE Nombre_usuario = '$nombreusuario' AND Apellido_paterno = '$apellidopaterno' AND Apellido_materno = '$apellidomaterno'");
        if(mysqli_num_rows($verificar_nombres) > 0){
            echo'<script>
            alert("el nombre y los apellidos ya han sido registrados");
            window.history.go(-1);
            </script>';
            exit;
        }

        $verificar_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE Usuario = '$usuario'");
        if(mysqli_num_rows($verificar_usuario) > 0){
            echo'<script>
            alert("el usuario ya ha sido registrado");
            window.history.go(-1);
            </script>';
            exit;
        }

        $resultado = mysqli_query($conn, $insert);
        if($resultado){
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
                <h3 class="panel-title">Agregar Usuario</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro-usuarios.php" method="POST" style="text-align:center;">

            <div class="control-group">
                <label class="control-label" for="Codigo">Codigo</label>
                <div class="controls">
                    <input type="text" name="Codigo_usuario" id="Codigo_usuario" placeholder="Codigo" class="form-control span8 tip">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="Nombre_usuario">Nombre</label>
                <div class="controls">
                    <input type="text" name="Nombre_usuario" id="Nombre_usuario" placeholder="Nombre" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Apellido_paterno">Apellido Paterno</label>
                <div class="controls">
                    <input type="text" name="Apellido_paterno" id="Apellido_paterno" placeholder="Apellido Paterno" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Apellido_materno">Apellido Materno</label>
                <div class="controls">
                    <input name="Apellido_materno" id="Apellido_materno" class="form-control span8 tip" type="text" placeholder="Apellido Materno"  />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Usuario">Usuario</label>
                <div class="controls">
                    <input name="Usuario" id="Usuario" class=" form-control span8 tip" type="text" placeholder="usuario" required />
                </div>
            </div>

           <div class="control-group">
                <label class="control-label" for="Password">Contraseña</label>
                <div class="controls">
                    <input name="Password" id="Password" class=" form-control span8 tip" type="password" placeholder="Contraseña" required />
                </div>
            </div>

           <div class="control-group">
            <label class="control-label" for="basicinput">Puesto</label>
                <div class="controls">
                    <select required id="Puesto" name="Puesto" class="form-control span8 tip">
                        <option value="0" selected>-- selecciona --</option>
                        <option codigo="01" value="Gerente">Gerente</option>
                        <option codigo="04" value="Vendedor">Ventas</option>
                        <option codigo="02" value="Encargado">Encargado</option>
                        <option codigo="03" value="Empleado">Empleado</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
            <label class="control-label" for="basicinput">Privilegios</label>
                <div class="controls">
                    <select id="Privilegio" name="Privilegio" required class="form-control span8 tip">
                        <option value="" selected></option>
                        <option codigo="01" value="1">Administrador</option>
                        <option codigo="04" value="10">Vendedor</option>
                        <option codigo="02" value="2">Corte</option>
                        <option codigo="02" value="3">Confeccion</option>
                        <option codigo="02" value="4">Terminado</option>
                        <option codigo="02" value="5">Almacen</option>
                        <option codigo="03" value="6">Corte</option>
                        <option codigo="03" value="7">Confeccion</option>
<!--
                        <option codigo="03" value="8">Terminado</option>
                        <option codigo="03" value="9">Almacen</option>
-->
                   </select>
                </div>
            </div>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                   <a href="usuarios.php" class="btn btn-sm btn-danger">Cancelar</a>
                </div>
            </div>
            <br>
        </form>
        </div>
</div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
// Consigue el elemento Puesto/Privilegios por su identificador id. Es un método del DOM de HTML
var id1 = document.getElementById("Puesto");
var id2 = document.getElementById("Privilegio");

// Añade un evento change al elemento id1, asociado a la función cambiar()
if (id1.addEventListener) {     // Para la mayoría de los navegadores, excepto IE 8 y anteriores
    id1.addEventListener("change", cambiar);
} else if (id1.attachEvent) {   // Para IE 8 y anteriores
    id1.attachEvent("change", cambiar); // attachEvent() es el método equivalente a addEventListener()
}

// Definición de la función cambiar()
function cambiar() {
    for (var i = 0; i < id2.options.length; i++)

    // -- Inicio del comentario --
    // Muestra solamente los id2 que sean iguales a los id1 seleccionados, según la propiedad display
    if(id2.options[i].getAttribute("codigo") == id1.options[id1.selectedIndex].getAttribute("codigo")){
        id2.options[i].style.display = "block";
    }else{
        id2.options[i].style.display = "none";
    }
    // -- Fin del comentario --

    id2.value = "";
}

// Llamada a la función cambiar()
cambiar();
</script>
</body>
