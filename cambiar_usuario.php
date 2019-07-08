<?php
ob_start();
session_start();
require_once 'config.php';
if(!isset($_SESSION['logged_in'])){
	header('Location: login.php');
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
        $idusuario = intval($_SESSION['ID_Usuario']);
        $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_Usuario='$idusuario'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: mi-cuenta.php");
        }else{
            $row = mysqli_fetch_assoc($sql);
        }

        if(isset($_POST['update'])){
            $idusuario	= intval($_POST['ID_Usuario']);
            $usuario  = mysqli_real_escape_string($conn,(strip_tags($_POST['Usuario'], ENT_QUOTES)));

            $update = "UPDATE usuarios SET Usuario='$usuario' WHERE ID_Usuario='$idusuario'";

            $verificar_usuario = mysqli_query($conn, "select Usuario from usuarios where Usuario = '$usuario'");
            if(mysqli_num_rows($verificar_usuario) > 0){
                echo'<script>
                alert("el usuario que has ingresado ya esta registrado. Por favor elige otro diferente.");
                window.history.go(-1);
                </script>';
                exit;
            }

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
                <h3>Actualizar Usuario</h3>
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
            <label class="control-label" for="basicinput">Usuario</label>
            <div class="controls">
                <input name="Usuario" id="Usuario" value="<?php echo $row['Usuario']; ?>" class="form-control span8 tip" type="text"  required />
            </div>
        </div>
        <br>
        <hr>

        <div class="control-group">
            <center>
            <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
               <a href="mi-cuenta.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
        </div>
        <br>
        </form>
    </div>
</div>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
