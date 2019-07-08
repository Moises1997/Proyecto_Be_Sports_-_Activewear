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
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("usuarios/head.php");?>
</head>
<body>
<br>
<div class="container">
    <?php
        $idusuario = intval($_GET['ID_Usuario']);
        $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_Usuario='$idusuario'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: usuarios.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idusuario	= intval($_POST['ID_Usuario']);
            $codigousuario = mysqli_real_escape_string($conn,(strip_tags($_POST['Codigo_usuario'], ENT_QUOTES)));
            $nombreusuario = mysqli_real_escape_string($conn,(strip_tags($_POST['Nombre_usuario'], ENT_QUOTES)));
            $apellidopaterno = mysqli_real_escape_string($conn,(strip_tags($_POST['Apellido_paterno'], ENT_QUOTES)));
            $apellidomaterno = mysqli_real_escape_string($conn,(strip_tags($_POST['Apellido_materno'], ENT_QUOTES)));
            $usuario  = mysqli_real_escape_string($conn,(strip_tags($_POST['Usuario'], ENT_QUOTES)));
            $password  = mysqli_real_escape_string($conn,(strip_tags($_POST['Password'], ENT_QUOTES)));
            $puesto  = mysqli_real_escape_string($conn,(strip_tags($_POST['Puesto'], ENT_QUOTES)));
            $privilegio  = mysqli_real_escape_string($conn,(strip_tags($_POST['Privilegio'], ENT_QUOTES)));

            $update = "UPDATE usuarios SET Codigo_usuario='$codigousuario', Nombre_usuario='$nombreusuario', Apellido_paterno='$apellidopaterno', Apellido_materno='$apellidomaterno', Usuario='$usuario', Password='$password', Puesto='$puesto', Privilegio='$privilegio'
            WHERE ID_Usuario='$idusuario'";

            $resultado = mysqli_query($conn, $update);
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
                <h3>Actualizar datos del Usuario</h3>
            </div>
        </div>
        <hr>
        <form name="form1" id="form1" class="form-horizontal row-fluid" action="" method="POST" align="center" >
        <div class="control-group" hidden>
            <label class="control-label" for="basicinput">ID Usuario</label>
            <div class="controls">
                <input type="text" name="ID_Usuario" id="ID_Usuario" value="<?php echo $row['ID_Usuario']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
            </div>
        </div>
        <br>

        <div class="control-group">
            <label class="control-label" for="basicinput">Codigo</label>
            <div class="controls">
                <input type="text" name="Codigo_usuario" id="Codigo_usuario" value="<?php echo $row['Codigo_usuario']; ?>" placeholder="" class="form-control span8 tip" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Nombre</label>
            <div class="controls">
                <input type="text" name="Nombre_usuario" id="Nombre_usuario" value="<?php echo $row['Nombre_usuario']; ?>" placeholder="" class="form-control span8 tip" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Apellido Paterno</label>
            <div class="controls">
                <input type="text" name="Apellido_paterno" id="Apellido_paterno" value="<?php echo $row['Apellido_paterno']; ?>" placeholder="" class="form-control span8 tip" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Apellido Materno</label>
            <div class="controls">
                <input name="Apellido_materno" id="Apellido_materno" value="<?php echo $row['Apellido_materno']; ?>" class="form-control span8 tip" type="text"  required />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Usuario</label>
            <div class="controls">
                <input name="Usuario" id="Usuario" value="<?php echo $row['Usuario']; ?>" class="form-control span8 tip" type="text"  required />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Contraseña</label>
            <div class="controls">
                <input name="Password" id="Password" value="<?php echo $row['Password']; ?>" class=" form-control span8 tip" type="password" />
                <div class="input-group-append"></div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="basicinput">Puesto</label>
            <div class="controls">
                <select required id="Puesto" name="Puesto" class="form-control span8 tip">
                    <option value="<?php echo $row['Puesto']; ?>" selected><?php echo $row['Puesto']; ?></option>
                    <option codigo="01" value="Gerente">Gerente</option>
                    <option codigo="02" value="Encargado">Encargado</option>
                    <option codigo="03" value="Empleado">Empleado</option>
                </select>
            </div>
        </div>

        <div class="control-group">
        <label class="control-label" for="basicinput">Privilegios</label>
            <div class="controls">
                <select id="Privilegio" name="Privilegio" required class="form-control span8 tip">
                    <option value="<?php echo $row['Privilegio']; ?>" selected><?php echo $row['Privilegio']; ?></option>
                    <option codigo="01" value="1">Administrador</option>
                    <option codigo="02" value="2">Corte</option>
                    <option codigo="02" value="3">Confeccion</option>
                    <option codigo="02" value="4">Terminado</option>
                    <option codigo="02" value="5">Almacen</option>
                    <option codigo="03" value="6">Corte</option>
                    <option codigo="03" value="7">Confeccion</option>
                    <option codigo="03" value="8">Terminado</option>
                    <option codigo="03" value="9">Almacen</option>

               </select>
            </div>
        </div>
        <br>
        <hr>

        <div class="control-group">
            <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
               <a href="usuarios.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
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
