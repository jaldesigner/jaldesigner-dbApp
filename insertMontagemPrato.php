<?php

include './dbconfig.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$ID_APP = $obj['ID_APP'];
$id_prato = $obj['id_prato'];
$nome_opcao = $obj['nome_opcao'];
$data_montagem = date('j-n-Y');

$sql = "INSERT INTO montagem_prato (id_prato, nome_opcao, data_montagem, id_App)VALUES('$id_prato', '$nome_opcao', '$data_montagem', '$ID_APP')";

if($id_prato != ''){
    $con->query($sql);

    $MSG[0] = 'gravado';
    $MSG[1] = 1;

    $json = json_encode($MSG);
}

echo $json;
$con->close();
