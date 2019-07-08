<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{

	$fetch = mysqli_query($con,"SELECT * FROM usuarios where Codigo_usuario like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' or Nombre_usuario like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50");

	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['ID_Usuario'];
		$row_array['value'] = $row['Nombre_usuario']." ".$row['Apellido_paterno']." ".$row['Apellido_materno'];
		$row_array['ID_Usuario']=$id_cliente;
		$row_array['Codigo_usuario']=$row['Codigo_usuario'];
		$row_array['Nombre_usuario']=$row['Nombre_usuario']." ".$row['Apellido_paterno']." ".$row['Apellido_materno'];
		$row_array['Puesto']=$row['Puesto'];
		array_push($return_arr,$row_array);
    }

}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>
