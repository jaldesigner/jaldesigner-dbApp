<?php
include './dbconfig.php';

$json =  file_get_contents('php://input');

$obj = json_decode($json, true);

$id_item = $obj['id_item'];
$ID_APP = $obj['ID_APP'];

$sql = "DELETE FROM opcao_prato_dia WHERE id_opcao='$id_item' && id_app='$ID_APP'";

if($id_item != ''){
    $con->query($sql)or die($con->error);

    $MSG[0] = 'Deletado';
    $MSG[1] = '1';

    $json = json_encode($MSG);
    echo $json;
}else{
    $MSG[0] = 'erro';
    $MSG[1] = '1';

    $json = json_encode($MSG);
    echo $json;
}

$con->close();