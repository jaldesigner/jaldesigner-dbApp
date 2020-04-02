<?php

include 'dbconfig.php';

//conecta com o banco de dados usando mysqli
$con = new mysqli($host, $hostUser, $hostPass, $db);

if($con->connect_error){
    die('Algo de arrado com a conexão.');
}

//pega o Json recebido e o coloca na variável
$json = file_get_contents('php://input');

//Decodifica o Json recebido e o guarda na variável
$obj = json_decode($json, true);


$tabela   = $obj['tabela'];


$Sql_Query = "insert into $tabela ($campo) values('$in_valor')";

$sqlCount = "select * from $tabela";
$count = $con->query($sqlCount);

if($in_valor != ''){
    $con->query($Sql_Query);
    $MSG[0] = 'gravado';
    $MSG[1] = $count->num_rows;
    $json = json_encode($MSG);
    //$json2 = json_encode($count);

    echo $json;
}else{
    echo 'Algo deu Errado!';
}

$con->close();