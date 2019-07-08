<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	//0 => 'ID_Usuario',
    0 => 'No_modelo',
    1 => 'Nombre_modelo',
    2 => 'cantidad',
    3 => 'descripcion',
    4 => 'cantidad_modelo.fecha'
);

// getting total number records without any search
$sql ="SELECT *";
$sql.=" FROM cantidad_modelo INNER JOIN modelo ON cantidad_modelo.ID_Modelo=modelo.ID_Modelo";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data-cantidad-terminado.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM cantidad_modelo INNER JOIN modelo ON cantidad_modelo.ID_Modelo=modelo.ID_Modelo";
	$sql.=" WHERE cantidad LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" OR modelo.No_modelo LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR modelo.Nombre_modelo LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cantidad_modelo.cantidad LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cantidad_modelo.descripcion LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cantidad_modelo.fecha LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-cantidad-terminado.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-cantidad-terminado.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql.=" FROM cantidad_modelo INNER JOIN modelo ON cantidad_modelo.ID_Modelo=modelo.ID_Modelo";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-cantidad-terminado.php: get PO");

}


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

    $nestedData[] = $row["No_modelo"];
    $nestedData[] = $row["Nombre_modelo"];
    $nestedData[] = $row["cantidad"];
    $nestedData[] = $row["descripcion"];
    $nestedData[] = date("d/m/Y", strtotime($row["fecha"]));

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
