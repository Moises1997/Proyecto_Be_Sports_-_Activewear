<?php
ob_start();
session_start();
require_once 'config.php';
if(!isset($_SESSION['logged_in'])){
	header('Location: login.php');
}
?>
<?php require_once 'usuarios/head.php';?>
<?php
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->account( $_POST );
			if($data)$success = PASSOWRD_CHANAGE_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
?>
  <?php
    require 'conn.php';
    $idusuario = intval($_SESSION['ID_Usuario']);
    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE ID_Usuario='$idusuario'");
    $row = mysqli_fetch_array($sql);
  ?>
   <br>
    <div class="container">
       <div class="panel panel-default">
        <div class="panel-heading">
     		<div align="center">
     			<?php require_once 'templates/message.php';?>
     			<h3 style="font-family: cursive;"><span class="icon icon-user"></span><br>Mi cuenta</h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="pull-left">
                    <a href="login.php" class="btn btn-sm btn-success"><span class="icon icon-home"></span><br>Menu Principal</a>
                </div><br><br>
                <hr>
           </div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="account-form" method="post" class="form-horizontal row-fluid" role="form">

					<div class="control-group">
						<label for="inputPassword3" class="control-label">No. Empleado:</label>
						<div class="controls text-info">
							<p> <?php echo $_SESSION['Codigo_usuario']; ?> </p>
						</div>
						<label for="inputEmail3" class="control-label">Nombre:</label>
						<div class="controls text-info">
							<p> <?php echo $_SESSION['Nombre_usuario']; ?> <?php echo $_SESSION['Apellido_paterno']; ?> <?php echo $_SESSION['Apellido_materno']; ?> </p>
						</div>
						<label for="inputPassword3" class="control-label">Usuario:</label>
						<div class="controls">
                            <a href="cambiar_usuario.php" name="update" id="update" title="cambiar Nombre de Usuario" style="text-decoration:none;" data-loading-text="Cambiar usuario" class="text text-danger"><p> <?php echo $row['Usuario']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></a>
						</div>
					</div>
					<hr>
					<div class="control-group">
						<label for="inputPassword3" class="control-label">Contraseña Actual</label>
						<div class="controls">
							<input name="old_password" id="old_password" type="text" class="form-control span8 tip">
							<span class="help-block"></span>
						</div>
					</div>

					<div class="control-group">
						<label for="inputPassword3" class="control-label"> Nueva Contraseña</label>
						<div class="controls">
							<input name="Password" id="Password" type="text" class="form-control span8 tip">
							<span class="help-block"></span>
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword3" class="control-label"> Confirmar Contraseña</label>
						<div class="controls">
							<input name="Confirm_Password" id="Confirm_Password" type="text" class="form-control span8 tip">
							<span class="help-block"></span>
						</div>
					</div>
					<input type="hidden" id="ID_Usuario" name="ID_Usuario" value="<?php echo $_SESSION['ID_Usuario']; ?>">
					<input type="hidden" id="Usuario" value="<?php echo $_SESSION['Usuario']; ?>" />
                    </br>

					<center>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando contraseña...." style="padding: 10px;">Cambiar Contraseña</button>
						</div>
					</div>
           </center><br>
				</form>
		</div>

     	</div>
    </div> <!-- /container -->
<script src="js/jquery.validate.min.js"></script>
<script src="js/account.js"></script>

<?php ob_end_flush(); ?>
