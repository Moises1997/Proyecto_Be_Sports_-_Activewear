<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	//0 => 'ID_Usuario',
    0 => 'Nombre_operacion',
    1 => 'Precio',
    2 => 'Nombre_maquina',



);

// getting total number records without any search
$sql ="SELECT *";
$sql.=" FROM operaciones INNER JOIN maquina ON operaciones.ID_Maquina = maquina.ID_Maquina";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql ="SELECT *";
	$sql.=" FROM operaciones INNER JOIN maquina ON operaciones.ID_Maquina = maquina.ID_Maquina";
	$sql.=" WHERE Nombre_operacion LIKE '".$requestData['search']['value']."%' ";
    $sql.=" or Precio LIKE '".$requestData['search']['value']."%' ";
    $sql.=" or Nombre_maquina LIKE '".$requestData['search']['value']."%' ";

    //$sql.=" WHERE Privilegio LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql ="SELECT *";
	$sql.=" FROM operaciones INNER JOIN maquina ON operaciones.ID_Maquina = maquina.ID_Maquina";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

    $nestedData[] = $row["Nombre_operacion"];
    $nestedData[] = $row["Precio"];
    $nestedData[] = $row["Nombre_maquina"];
    $nestedData[] = '<td><center>
                     <a href="editar_operaciones.php?ID_Operacion='.$row['ID_Operacion'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="operaciones.php?action=delete&ID_Operacion='.$row['ID_Operacion'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger" onclick="pregunta(event)"> <i class="menu-icon icon-trash"></i> </a>
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
