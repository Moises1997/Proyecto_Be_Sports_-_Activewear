<?php
require_once 'config.php';
$db = new Cl_DBclass();

if( isset( $_POST['Password'] ) && !empty($_POST['Password'])){
	$Password =( trim( $_POST['Password'] ) );
	$Usuario = $_POST['Usuario'];
	if( !empty( $Usuario) && !empty($Password) ){
		$query = " SELECT count(Usuario) cnt FROM usuarios where Password = '$Password' and Usuario = '$Usuario' ";
		$result = mysqli_query($db->con, $query);
		$data = mysqli_fetch_assoc($result);
		if($data['cnt'] == 1){
			echo 'true';
		}else{
			echo 'false';
		}
	}else{
		echo 'false';
	}
	exit;
}

if( isset( $_POST['Usuario'] ) && !empty($_POST['Usuario'])){
	$Usuario = $_POST['Usuario'];
	$query = " SELECT count(Usuario) cnt FROM usuarios where Usuario = '$Usuario' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['Usuario'] ) && !empty($_GET['Usuario'])){
	$Usuario = $_GET['Usuario'];
	$query = " SELECT count(Usuario) cnt FROM usuarios where Usuario = '$Usuario' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}
