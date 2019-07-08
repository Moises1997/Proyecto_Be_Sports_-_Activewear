<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image</title>
</head>
<body>
<br>
<div class="container">
   <?php

	error_reporting( ~E_NOTICE ); // avoid notice

	require_once 'dbconfig.php';
    require 'usuarios/head.php';

	if(isset($_POST['input']))
	{
		$No_modelo = $_POST['No_modelo'];
        $Nombre_modelo = $_POST['Nombre_modelo'];
        $Caracteristicas = $_POST['Caracteristicas'];

		$imgFile = $_FILES['Imagen']['name'];
		$tmp_dir = $_FILES['Imagen']['tmp_name'];
		$imgSize = $_FILES['Imagen']['size'];

        $upload_dir = 'imagen/modelos/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic = rand(1000,1000000).".".$imgExt;

        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions)){
            // Check file size '30MB'
            if($imgSize < 30000000)				{
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
                $errMSG = "Error, la imagen es demasiado grande.";
            }
        }
        else{
            $errMSG = "Error, solo imagenes con formato JPG, JPEG, PNG & GIF son permitidos.";
        }


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO modelo (ID_Modelo, No_modelo, Nombre_modelo, Caracteristicas, Imagen) VALUES(NULL, :uNo_modelo, :uNombre_modelo, :uCaracteristicas, :uImagen)');
			$stmt->bindParam(':uNo_modelo',$No_modelo);
			$stmt->bindParam(':uNombre_modelo',$Nombre_modelo);
			$stmt->bindParam(':uCaracteristicas',$Caracteristicas);
            $stmt->bindParam(':uImagen',$userpic);

            if($stmt->execute()){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div><script>
                window.history.go(-2);
                </script>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
            }
		}
	}
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div align="center">
                <h3 class="panel-title">Agregar Modelo</h3>
            </div>
        </div>
        <hr>
        <br>
        <form method="post" enctype="multipart/form-data" class="form-horizontal row-fluid" style="text-align:center;">
            <div class="control-group">
                <label class="control-label" for="Nombre">No. Modelo</label>
                <div class="controls">
                    <input type="text" name="No_modelo" id="No_modelo" placeholder="Numero de modelo" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Nombre">Nombre Modelo</label>
                <div class="controls">
                    <input type="text" name="Nombre_modelo" id="Nombre_modelo" placeholder="Nombre del Modelo" class="form-control span8 tip" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="Precio">Caracteristicas</label>
                <div class="controls">
                    <textarea type="text" name="Caracteristicas" id="Caracteristicas" placeholder="Caracteristicas" class="form-control span8 tip" required></textarea>
                </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="">Imagen</label>
                <div class="controls">
                    <input type="file" name="Imagen" id="Imagen" placeholder="">
                </div>
            </div>
            <hr>

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
</body>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>
