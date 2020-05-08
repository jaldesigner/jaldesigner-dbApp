<?php
include './dbconfig.php';

$json =  file_get_contents('php://input');

$obj = json_decode($json, true);

$id_montagem = $obj['id_montagem'];
$ID_APP = $obj['ID_APP'];

$sql = "DELETE FROM montagem_prato WHERE id_montagem ='$id_montagem' && id_App='$ID_APP'";

if($id_montagem != ''){
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