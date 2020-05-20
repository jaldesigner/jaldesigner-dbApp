<?php
include('./dbconfig.php');


$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$ID_APP = $obj['ID_APP'];
$data = date('d-n-Y'); 

$sql = "SELECT * FROM opcao_prato_dia WHERE id_app = '$ID_APP' && data_opcao_prato_dia = '$data'";

$result = $con->query($sql) or die($con->error);

if ($result->num_rows > 0) {
    while ($row[] = $result->fetch_assoc()) {
        $pratos = $row;
        $json = json_encode($pratos);
    }
}
echo $json;
$con->close();
