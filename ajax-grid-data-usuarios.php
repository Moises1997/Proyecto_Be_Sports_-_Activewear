<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	//0 => 'ID_Usuario',
    0 => 'Codigo_usuario',
    1 => 'Nombre_usuario',
    2 => 'Apellido_paterno',
    3 => 'Apellido_materno',
    4 => 'Usuario',
    5 => 'Password',
    6 => 'Puesto',
    7 => 'Fecha_de_creacion',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM usuarios";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data-usuarios.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM usuarios";
    $sql.=" WHERE Codigo_usuario LIKE'".$requestData['search']['value']."%'";
	$sql.=" OR Nombre_usuario LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Apellido_paterno LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Apellido_materno LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Usuario LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Puesto LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Fecha_de_creacion LIKE'".$requestData['search']['value']."%'";
    // $requestData['search']['value'] contains search parameter
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-usuarios.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-usuarios.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql.=" FROM usuarios";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-usuarios.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
    $nestedData[] = $row["Codigo_usuario"];
    $nestedData[] = $row["Nombre_usuario"];
    $nestedData[] = $row["Apellido_paterno"];
    $nestedData[] = $row["Apellido_materno"];
    $nestedData[] = $row["Usuario"];
    $nestedData[] = $row["Puesto"];
    $nestedData[] = $row["Password"];
    $nestedData[] = date("d/m/Y", strtotime($row["Fecha_de_creacion"]));
    $nestedData[] = '<td><center>
                     <a href="editar_usuario.php?ID_Usuario='.$row['ID_Usuario'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="usuarios.php?action=delete&ID_Usuario='.$row['ID_Usuario'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger" onclick="pregunta(event)"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';

	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format
?>
