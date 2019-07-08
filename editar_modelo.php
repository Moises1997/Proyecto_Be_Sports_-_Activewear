<?php

	error_reporting( ~E_NOTICE );

	require_once 'dbconfig.php';
    require 'usuarios/head.php';

	if(isset($_GET['ID_Modelo']) && !empty($_GET['ID_Modelo']))
	{
		$id = $_GET['ID_Modelo'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM modelo WHERE ID_Modelo =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: modelos.php");
	}



	if(isset($_POST['input']))
	{
		$No_modelo = $_POST['No_modelo'];
		$Nombre_modelo = $_POST['Nombre_modelo'];
        $Caracteristicas = $_POST['Caracteristicas'];

		$imgFile = $_FILES['Imagen']['name'];
		$tmp_dir = $_FILES['Imagen']['tmp_name'];
		$imgSize = $_FILES['Imagen']['size'];

		if($imgFile)
		{
			$upload_dir = 'imagen/modelos/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{
				if($imgSize < 30000000)
				{
					unlink($upload_dir.$edit_row['Imagen']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Error, la imagen es demasiado grande.";
				}
			}
			else
			{
				$errMSG = "Error, solo imagenes con formato JPG, JPEG, PNG & GIF son permitidos.";
			}
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['Imagen']; // old image from database
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE modelo SET No_modelo=:uNo_modelo, Nombre_modelo=:uNombre_modelo, Caracteristicas=:uCaracteristicas, Imagen=:uImagen WHERE ID_Modelo=:uid');
			$stmt->bindParam(':uNo_modelo',$No_modelo);
			$stmt->bindParam(':uNombre_modelo',$Nombre_modelo);
			$stmt->bindParam(':uCaracteristicas',$Caracteristicas);
            $stmt->bindParam(':uImagen',$userpic);
			$stmt->bindParam(':uid',$id);

			if($stmt->execute()){
				?>
                <script>
				window.location.href='modelos.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}

		}


	}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image</title>

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h3 class="panel-title">Editar Modelo</h3>
            </div>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <a href="modelos.php" class="btn btn-danger"><i class="icon icon-arrow-left"></i> Volver</a>
            </div><br>
        <hr>
        <br>

    <form method="post" enctype="multipart/form-data" class="form-horizontal row-fluid" style="text-align:center;">


    <div class="control-group">
        <label class="control-label" for="Nombre">No. Modelo</label>
        <div class="controls">
            <input type="text" name="No_modelo" id="No_modelo" placeholder="Numero de modelo" class="form-control span8 tip" required value="<?php echo $No_modelo; ?>">
        </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Nombre">Nombre Modelo</label>
            <div class="controls">
                <input type="text" name="Nombre_modelo" id="Nombre_modelo" placeholder="Nombre del Modelo" class="form-control span8 tip" required value="<?php echo $Nombre_modelo;?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Precio">Caracteristicas</label>
            <div class="controls">
                <input type="text" name="Caracteristicas" id="Caracteristicas" placeholder="Caracteristicas" class="form-control span8 tip" required value="<?php echo $Caracteristicas;?>">
            </div>
        </div>

        <div class="control-group">
           <label class="control-label" for="">Imagen</label>
            <div class="controls">
                <img src="imagen/modelos/<?php echo $Imagen;?>" alt="" class="img-responsive img-rounded img-thumbnail" width="100px"><br><br>
                <input type="file" name="Imagen" id="Imagen">
            </div>
        </div>
        <hr>
        <br>
        <div class="control-group">
           <center>
            <div class="controls">
                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Guardar</button>
               <a href="modelos.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            </center>
            <br><br>
        </div>
    </form>
        </div>
</div>
</body>
</html>
