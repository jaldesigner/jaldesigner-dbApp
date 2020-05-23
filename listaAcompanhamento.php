<?php

include './dbconfig.php';
$json = file_get_contents('php://input');
$obj  = json_decode($json, true);
//$ID_APP = 'SUQ6IDEKRW1wcmVzYTogSkQgUmVmZWnDp8O1ZXMKUmVwcmVzZW50YW50ZTogSm9uYXMgQWx2ZXMgTHVjYXM=';
$ID_APP = $obj['ID_APP'];
//$data = date('d-n-Y'); //$obj['data'];

$sql = "SELECT * FROM opcao_prato WHERE id_App = '$ID_APP'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row[] = $result->fetch_assoc()) {
        $opcao = $row;
        $json = json_encode($opcao);
    }
}

echo $json;

$con->close(); //Fechamos a conexão
