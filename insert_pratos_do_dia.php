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
$data = $obj['data'];
$exibe = 1;

if($in_valor != ''){
    $con->query("UPDATE prato SET exibir='$exibe' WHERE id_App='$ID_APP' AND nome_prato='$in_valor'");
    $con->query("INSERT INTO prato_do_dia (id_app, nome_prato_dia, data_prato_do_dia)VALUES('$ID_APP', '$in_valor', '$data')");

    $MSG[0] = 'gravado';
    $MSG[1] = '1';
    $json = json_encode($MSG);
    //$json2 = json_encode($count);
    echo $json;
}else{
    echo 'Algo deu Errado!';
}
