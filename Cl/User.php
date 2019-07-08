<?php
class Cl_User
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	protected $_con;

	/**
	 * Inializar DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}

	/**
	 * Registro de usuarios
	 * @param array $data
	  */
	public function registration( array $data )
	{
		if( !empty( $data ) ){

			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);



			// escapar de las variables para la seguridad
            $Codigo_usuario = mysqli_real_escape_string( $this->_conn, $trimmed_data['Codigo_usuario']);
			$Nombre_usuario = mysqli_real_escape_string( $this->_con, $trimmed_data['Nombre_usuario'] );
			$Apellido_paterno = mysqli_real_escape_string( $this->_con, $trimmed_data['Apellido_paterno'] );
			$Apellido_materno = mysqli_real_escape_string( $this->_con, $trimmed_data['Apellido_materno'] );
            $Usuario = mysqli_real_escape_string( $this->_con, $trimmed_data['Usuario'] );
            $Password = mysqli_real_escape_string( $this->_con, $trimmed_data['Password'] );
            $CPassword = mysqli_real_escape_string( $this->_con, $trimmed_data['Confirm_Password'] );
            $Puesto = mysqli_real_escape_string( $this->_con, $trimmed_data['Puesto'] );
            $Privilegio = mysqli_real_escape_string( $this->_con, $trimmed_data['Privilegio'] );


			if( (!$Codigo_usuario) || (!$Nombre_usuario) || (!$Apellido_paterno) || (!$Apellido_materno) ||(!$Usuario) || (!$Password) || (!$CPassword) ||(!$Puesto) ||(!$Privilegio) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($Password !== $CPassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$query = "INSERT INTO usuarios (ID_Usuario, Codigo_usuario, Nombre_usuario, Apellido_paterno, Apellido_materno, Usuario, password, Puesto, Privilegio, Fecha_de_creacion) VALUES (NULL, '$Codigo_usuario', '$Nombre_usuario', '$Apellido_paterno', '$Apellido_materno', '$Usuario', '$Password', '$Puesto', '$Privilegio', CURRENT_TIMESTAMP)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){

			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);

			// escapar de las variables para la seguridad
			$Usuario = mysqli_real_escape_string( $this->_con,  $trimmed_data['Usuario'] );
			$Password = mysqli_real_escape_string( $this->_con,  $trimmed_data['Password'] );

			if((!$Usuario) || (!$Password) ) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
			$query = "SELECT ID_Usuario, Codigo_usuario, Nombre_usuario, Apellido_paterno, Apellido_materno, Usuario, Puesto, Privilegio, Fecha_de_creacion FROM usuarios where Usuario = '$Usuario' and Password = '$Password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				return true;
			}else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}

	/**
	 * El siguiente metodo para verificar los datos de la cuenta para el cambio de contraseña
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */

	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);

			// escapar de las variables para la seguridad
			$Password = mysqli_real_escape_string( $this->_con, $trimmed_data['Password'] );
			$CPassword = $trimmed_data['Confirm_Password'];
			$ID_Usuario = mysqli_real_escape_string( $this->_con, $trimmed_data['ID_Usuario'] );

			if((!$Password) || (!$CPassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($Password !== $CPassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$query = "UPDATE usuarios SET Password = '$Password' WHERE ID_Usuario = '$ID_Usuario'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}

	/**
	 * Este metodo para cerrar las sesión
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: login.php');
	}

	/**
	 * Esto restablece la contraseña actual y la nueva contraseña para enviar correo
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){

			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string( $this->_con, trim( $data['email'] ) );

			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$Password = $this->randomPassword();
			$query = "UPDATE users SET password = '$password' WHERE email = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$to = $email;
				$subject = "Nueva solicitud de contraseña";
				$txt = "Su nueva contraseña ".$Password;
				$headers = "From: " . "\r\n" .
						"CC: ";

				mail($to,$subject,$txt,$headers);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}

	/**
	 * Esto generará una contraseña aleatoria
	 * @return string
	 */

	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el array en una cadena
	}
}
