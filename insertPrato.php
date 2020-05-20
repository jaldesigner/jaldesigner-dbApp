<?php

include 'dbconfig.php';

//pega o Json recebido e o coloca na variável
$json = file_get_contents('php://input');

//Decodifica o Json recebido e o guarda na variável
$obj = json_decode($json, true);

$ID_APP   =  $obj['ID_APP'];
$in_valor =  $obj['in_valor'];

$Sql_Query = "INSERT INTO prato (id_App, nome_prato, ativo, exibir)VALUES('$ID_APP','$in_valor','1','1')";

if ($in_valor != '') {
    if ($con->query($Sql_Query)) {
        $MSG[0] = 'gravado';
        $MSG[1] = 1;
        $json = json_encode($MSG);
    }else{
        $MSG[2] = 'Erro';
        $json = json_encode($MSG);
    }
}

echo $json;
$con->close();
