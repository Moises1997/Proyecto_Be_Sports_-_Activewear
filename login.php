<?php
ob_start();
session_start();
require_once 'config.php';
?>
<?php
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				header('Location: menu_administrador.php');
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: menu_administrador.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Be Sports & Activewear</title>

<!--===============================================================================================-->
<link rel="icon" type="image/png" href="img/Logo_Be_Sports_Vector.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

</head>
<body>

<script src="js/jquery.min.js"></script>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
					<img src="img/Logo_Be_Sports_Vector.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="login-form" method="post" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<?php require_once'templates/message.php';?>
					<span class="login100-form-title">
                        <h5>Be Sports & Activewear</h5>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Introduce tu nombre de usuario">
						<input class="input100" type="text" name="Usuario" id="Usuario" placeholder="Usuario" autofocus required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
				        <i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduce tu contraseña">
						<input class="input100" type="password" name="Password" id="Password" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
				        <i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submit_btn" type="submit" data-loading-text="Iniciando sesion...">
                            Iniciar Sesión
						</button>
					</div>
<!--
					<p style="text-align:center; margin:auto;">
					    usuarios: <br><hr> M01535: Administrador <br> San: Corte <br> Ivon: Confeccion <br> Max: Terminado <br> Memo: Almacen <br> Ariel: Empleado
					    <br><br>
					    Contraseña: 12345 para todos
					</p>
-->
				</form>
			</div>
		</div>
	</div>

<!-- /container -->
<script src="js/jquery.validate.min.js"></script>
<script src="js/login.js"></script>
<script src="js/main.js"></script>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
</body>
</html>
<?php ob_end_flush(); ?>
