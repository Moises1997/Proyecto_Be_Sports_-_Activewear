<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	//0 => 'ID_Usuario',
    0 => 'ID_Almacen',
    1 => 'No_modelo',
    2 => 'Nombre_modelo',
    3 => 'Imagen',
    4 => 'Stock',
    5 => 'Talla',
    6 => 'Tipo_producto',
    7 => 'Nombre_seccion',
    8 => 'date_added',
    9 => 'Nombre_color',
    10 => 'Fecha_modificacion',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM almacen inner join modelo on almacen.ID_Modelo=modelo.ID_Modelo inner join talla on almacen.ID_Talla=talla.ID_Talla inner join tipo_producto on almacen.ID_Tipo_Producto=tipo_producto.ID_Tipo_Producto inner join seccion_almacen on almacen.ID_Seccion=seccion_almacen.ID_Seccion";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data-detalle-inventario-almacen.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM almacen inner join modelo on almacen.ID_Modelo=modelo.ID_Modelo inner join talla on almacen.ID_Talla=talla.ID_Talla inner join tipo_producto on almacen.ID_Tipo_Producto=tipo_producto.ID_Tipo_Producto inner join seccion_almacen on almacen.ID_Seccion=seccion_almacen.ID_Seccion";
	$sql.=" WHERE No_modelo LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Nombre_modelo LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Stock LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Talla LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Tipo_producto LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR Nombre_seccion LIKE'".$requestData['search']['value']."%'";
    $sql.=" OR date_added LIKE'".$requestData['search']['value']."%'";
    // $requestData['search']['value'] contains search parameter
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-detalle-inventario-almacen.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-detalle-inventario-almacen.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql.=" FROM almacen inner join modelo on almacen.ID_Modelo=modelo.ID_Modelo inner join talla on almacen.ID_Talla=talla.ID_Talla inner join tipo_producto on almacen.ID_Tipo_Producto=tipo_producto.ID_Tipo_Producto inner join seccion_almacen on almacen.ID_Seccion=seccion_almacen.ID_Seccion";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data-detalle-inventario-almacen.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
    $nestedData[] = $row["No_modelo"];
    $nestedData[] = $row["Nombre_modelo"];
    $nestedData[] = '<center><a href="imagen/modelos/'.$row["Imagen"].'"><img src="imagen/modelos/'.$row["Imagen"].'" width="40px" height="45px" style="margin:auto;"></a></center>';
    $nestedData[] = $row["Stock"];
    $nestedData[] = $row["Talla"];
    $nestedData[] = $row["Tipo_producto"];
    $nestedData[] = $row["Nombre_seccion"];
    $nestedData[] = date("d/m/Y", strtotime($row["date_added"]));
    $nestedData[] = date("d/m/Y", strtotime($row["Fecha_modificacion"]));
    $nestedData[] = '<td><center>
                     <a href="editar_inventario_almacen.php?ID_Almacen='.$row['ID_Almacen'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="detalle_inventario_almacen.php?action=delete&ID_Almacen='.$row['ID_Almacen'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger" onclick="pregunta(event)"> <i class="menu-icon icon-trash"></i> </a>
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
