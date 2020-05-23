<?php
//include 'dbconfig.php';
include './dbconfig.php';

//pega o Json recebido e o coloca na variável
$json = file_get_contents('php://input');

//Decodifica o Json recebido e o guarda na variável
$obj = json_decode($json, true);

//Variáveis que vem do App
$in_valor = $obj['in_valor'];
$ID_APP = $obj['ID_APP'];
//$data = $obj['data_full'];
$data = date('d-n-Y');
$exibe = 1;

$sql = "INSERT INTO opcao_prato_dia (id_app, nome_opcao, exibir, data_opcao_prato_dia)VALUES('$ID_APP', '$in_valor','$exibe', '$data')";

if ($in_valor != '') {
    //$con->query("UPDATE opcao_prato_dia SET exibir='$exibe' WHERE id_App='$ID_APP' AND nome_prato='$in_valor'");
    if ($con->query($sql)) {
        $MSG[0] = 'gravado';
        $MSG[1] = '1';
        $json = json_encode($MSG);
    }else{
        $MSG[0] = $con->error;
        $json = json_encode($MSG);
    }
}

echo $json;
$con->close();
