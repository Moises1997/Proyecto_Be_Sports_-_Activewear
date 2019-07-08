<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	//0 => 'ID_Tela',
    0 => 'Nombre_tela',
    1 => 'Nombre_color',
    2 => 'Caracteristicas',
    3 => 'Fecha',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM tela INNER JOIN colores ON tela.ID_Color = colores.ID_Color";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data-tela.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM tela INNER JOIN colores ON tela.ID_Color = colores.ID_Color";
	$sql.=" WHERE Nombre_tela LIKE '".$requestData['search']['value']."%' ";
    // $requestData['search']['value'] contains search parameter
    $sql.=" or Nombre_color LIKE '".$requestData['search']['value']."%' ";
    $sql.=" or Caracteristicas LIKE '".$requestData['search']['value']."%' ";
    $sql.=" or Fecha LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-tela.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-tela.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql.=" FROM tela INNER JOIN colores ON tela.ID_Color = colores.ID_Color";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-tela.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

    $nestedData[] = $row["Nombre_tela"];
    $nestedData[] = $row["Nombre_color"];
    $nestedData[] = $row["Caracteristicas"];
    $nestedData[] = date("d/m/Y", strtotime($row["Fecha"]));
    $nestedData[] = '<td><center>
                     <a href="editar_tela.php?ID_Tela='.$row['ID_Tela'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="telas.php?action=delete&ID_Tela='.$row['ID_Tela'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger" onclick="pregunta(event)"> <i class="menu-icon icon-trash"></i> </a>
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
