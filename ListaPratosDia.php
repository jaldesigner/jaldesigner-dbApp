<?php
include('./dbconfig.php');


$json = file_get_contents('php://input');
$obj = json_decode($json, true);




//$ID_APP = 'SUQ6IDEKRW1wcmVzYTogSkQgUmVmZWnDp8O1ZXMKUmVwcmVzZW50YW50ZTogSm9uYXMgQWx2ZXMgTHVjYXM=';
$ID_APP = $obj['ID_APP'];
$data = date('d-n-Y');//$obj['data'];
//echo date('d-n-Y');

$sql = "SELECT * FROM prato_do_dia WHERE id_app = '$ID_APP' && exibir='1' && data_prato_do_dia= '$data'";

$result = $con->query($sql)or die($con->error);
//print_r($result->fetch_assoc());

if ($result->num_rows > 0) {
    while ($row[] = $result->fetch_assoc()) {
        $pratos = $row;
        $json = json_encode($pratos);
        //echo $json;
        
    }
} 
echo $json;
$con->close();
