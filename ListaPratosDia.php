<?php
include('./dbconfig.php');


$json = file_get_contents('php://input');
$obj = json_encode($json, true);

$ID_APP = "SUQ6IDEKRW1wcmVzYTogSkQgUmVmZWnDp8O1ZXMKUmVwcmVzZW50YW50ZTogSm9uYXMgQWx2ZXMgTHVjYXM=";
$data = date('d/m/Y');//$obj['data'];

$sql = "SELECT * FROM prato 
        INNER JOIN prato_do_dia 
        ON prato.exibir=1 
        AND prato.id_app=$ID_APP 
        AND prato_do_dia.id_app=$ID_APP";
$result = $con->query($sql);

if ($result->fetch_assoc()) {
    while ($row[] = $result->fetch_assoc()) {
        $pratos = $row;
        $json = json_encode($pratos);
        echo $json;
    }
} else {
    echo 'Não há Pratos cadastrados.';
}

$con->close();

//$db->select('prato','id_prato,nome_prato,exibir,id_App',NULL, "id_App=$ID_APP && exibir='0'", NULL, NULL);
//$res = $db->getResult();

